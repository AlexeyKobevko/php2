<?php


namespace App\Controllers;


use App\Models\Basket;
use App\Models\User;
use \Exception;


class BasketController extends Controller
{
    //API
    /**
     * Метод добавляет товар в корзину
     * @param array $data //имеет вид ['productId' => int]
     * @return bool
     * @throws Exception
     */
    public function addToCart(array $data)
    {
        //Получаем ID из data
        $productId = $data['productId'] ?? null;
        //Получаем пользователя из сессии
        $user = $this->app->session['login'] ?? null;
        if (!$user) {
            throw new Exception('Не зарегистрирован');
        }
        if (!$productId) {
            throw new Exception('Товар не найден');
        }
        //TODO findOrCreate
        //Пытаемся получить товар из корзины
        $basket = Basket::getOne([
            [
                'col' => 'userId',
                'oper' => '=',
                'value' => $user->id
            ],
            [
                'col' => 'productId',
                'oper' => '=',
                'value' => $productId
            ]
        ]);
        //Если в БД нет, создаем
        if (!$basket) {
            $basket = new Basket([
                'userId' => $user->id,
                'productId' => $productId,
            ]);
        }
        //Увеличиваем количество
        $basket->amount++;
        //Сохраняем
        $basket->save();
        return true;
    }
    /**
     * Изменяет количество товара в корзине
     *
     * @param array $data //Имеет вид ['id' => int, 'value' => '++'|'--'|int]
     * @return int //Новое количество товара
     * @throws Exception
     */
    public function update(array $data): int
    {
        $id = $data['id'] ?? 0;
        $basketItem = Basket::getByKey($id);
        if (!$basketItem) {
            throw new Exception('Корзина не найдена');
        }
        //Наше value поддерживаем инкременты
        $value = $data['value'] ?? 0;
        if ($value === '++') {
            $basketItem->amount++;
        } elseif ($value === '--') {
            $basketItem->amount--;
        } else {
            $basketItem->amount = $value;
        }
        //Не разрешаем установить отрицательное количество в корзине
        if ($basketItem->amount < 0) {
            $basketItem->amount = 0;
        }
        //Сохраняем изменения
        $basketItem->save();
        //Возвращаем количество
        return $basketItem->amount;
    }
    //Не API
    /**
     * Выводит страницу корзины
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        if (empty($this->app->session['login'])) {
            header('Location: /login');
            die;
        }
        /**
         * @var User $user
         */
        $user = $this->app->session['login'];
        $this->template = 'basketPage.twig';
        return $this->render([
            'basket' => $user->getBasket()
        ]);
    }
}
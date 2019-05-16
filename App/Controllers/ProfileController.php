<?php


namespace App\Controllers;


use App\Models\Basket;
use App\Models\User;
use \Exception;


class ProfileController extends Controller
{
    /**
     * API метод авторизации
     * @param array $data //имеет вид ['login' => string, 'password' => string]
     * @return bool
     * @throws Exception
     */
    public function signIn(array $data) {
        if(empty($data['login']) || empty($data['password'])) {
            throw new Exception('Not Enough Data');
        }
        $user = User::getOne([
            [
                'col' => 'login',
                'oper' => '=',
                'value' => $data['login']
            ],
            [
                'col' => 'password',
                'oper' => '=',
                'value' => md5($data['password'])
            ]
        ]);
        if ($user) {
            $this->app->session['login'] = $user;
            return true;
        } else {
            throw new Exception('Неверная пара логин-пароль');
        }
    }

    /**
     * Выход из профиля
     * @param array $data
     * @return bool
     */
    public function signOut($data = []) {
        session_destroy();
        return true;
    }

    //Non API
    /**
     * Вывод страницы профиля
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index() {
        if(empty($this->app->session['login'])) {
            header('Location: /profile/login');
            die;
        }
        $this->template = 'users/profile.twig';
        return $this->render([
            'user' => $this->app->session['login'],
            'story' => unserialize($_COOKIE['story'])
        ]);
    }

    /**
     * Вывод страницы авторизации
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function login() {
        if(!empty($this->app->session['login'])) {
            header('Location: /profile');
            die;
        }
        $this->template = 'users/login.twig';
        return $this->render();
    }
}
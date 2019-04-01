<?php


namespace App\Controllers;


use App\Models\Category;
use App\Models\Product;


class CatalogController extends Controller
{
    protected $template = 'catalog/catalog.twig';
    /**
     * Выводит страницу каталога
     * @param array $data //Имеет вид ['categoryId' => int]
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index(array $data = []) //TODO подержка пагинации
    {
        $categoryId = $data['categoryId'] ?? 1;
        $category = Category::getByKey($categoryId);
        if(!$category) {
            throw new \Exception('Категоиря не найдена');
        }
        //Получаем подкатегории
        $categories = Category::get([[
            'col' => 'parentId',
            'oper' => $categoryId ? '=' : 'IS NULL',
            'value' => $categoryId
        ]]);
        //Получаем товары категории
        $products = Product::get([[
            'col' => 'categoryId',
            'oper' => $categoryId ? '=' : 'IS NULL',
            'value' => $categoryId
        ]]);
        return $this->render([
            'category' => $category,
            'categories' => $categories,
            'products' => $products
        ]);
    }
    /**
     * Выводит страницу товара
     * @param array $data // имеет вид ['productId' => int]
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function productPage(array $data)
    {
        if(!$product = Product::getByKey($data['productId'] ?? 0)) {
            throw new \Exception('Категоиря не найдена');
        }
        $this->template = 'catalog/product.twig';
        return $this->render(['product' => $product]);
    }
}
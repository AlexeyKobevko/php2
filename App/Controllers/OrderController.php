<?php


namespace App\Controllers;


class OrderController extends Controller
{
    protected $template = 'orderPage.twig';
    /**
     * Выводит страницу заказа
     * @param array $data
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index(array $data = [])
    {
        return $this->render();
    }
}

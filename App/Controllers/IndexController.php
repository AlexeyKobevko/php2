<?php


namespace App\Controllers;
class IndexController extends Controller
{
    protected $template = 'index.twig';
    /**
     * Выводит главную страницу
     * @param array $data
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index($data = [])
    {
        return $this->render();
    }
    /**
     * Выводит страницу ошибки
     * @param $data
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function error($data)
    {
        $this->template = 'error.twig';
        return $this->render($data);
    }
}
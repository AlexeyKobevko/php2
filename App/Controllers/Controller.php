<?php


namespace App\Controllers;
use App\App;
use App\Classes\Templater;
use App\Models\User;


abstract class Controller
{
    protected $template;
    /**
     * @var \Twig\Environment
     */
    protected $twig;
    /**
     * @var App
     */
    protected $app;
    public function __construct()
    {
        $this->twig = Templater::getInstance()->twig;
        //Добавляем свойство app в контроллер для быстрого доступа
        $this->app = App::getInstance();
        $story = isset($_COOKIE['story']) ? unserialize($_COOKIE['story']) : [];
        $story[] = $_GET['path'] ?? '/';
        $story = array_slice($story, -5);
        $newCookie = serialize($story);
        $_COOKIE['story'] = $newCookie;
        setcookie('story', $newCookie, 0, '/');
    }
    /**
     * @param array $params
     * @param string|null $template
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    protected function render(?array $params = [], ?string $template = null): string
    {
        if (!$template) {
            $template = $this->template;
        }
        $twig = $this->twig->load($template);
        $params = array_merge([
            'session' => $this->app->session,
        ], $params);
        return $twig->render($params);
    }
}
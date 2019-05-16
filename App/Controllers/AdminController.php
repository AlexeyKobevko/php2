<?php


namespace App\Controllers;


class AdminController extends Controller
{
    protected $template = 'adminIndex.twig';
    public function index($data = [])
    {
        return $this->render();
    }
}
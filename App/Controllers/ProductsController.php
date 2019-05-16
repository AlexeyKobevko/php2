<?php


namespace App\Controllers;


use App\Classes\Templater;
use App\Models\Product;


class ProductsController extends Controller
{
    protected $template = 'catalog/catalog.twig';
    public function index($data = [])
    {
        $products = Product::get(
            [
                [
                    'col' => 'id',
                    'oper' => '>',
                    'value' => 5
                ],
                [
                    'col' => 'id',
                    'oper' => '<=',
                    'value' => 10
                ]
            ],
            [
                [
                    'col' => 'id',
                    'direction' => 'desc'
                ]
            ]
        );
        return $this->render(['products' => $products]);
    }
}
<?php

use App\Classes\DB;
use App\Classes\Templater;

require_once __DIR__ . '/../config/config.php';

//function getProducts($perPage)
//{
//    $perPage = (int)$perPage;
//    $page = (int)($_GET['page'] ?? 0);
//    $start = $page * $perPage;
//    $sql = "SELECT * FROM `products2` LIMIT $start, $perPage";
//    return DB::getInstance()->fetchAll($sql);
//}

function getProduct($id)
{
    $sql = "SELECT * FROM `products2` WHERE `id` = $id";

    return DB::getInstance()->fetchOne($sql);
}

//function createProducts($perPage)
//{
//    $products = getProducts($perPage);
//
//    $template = Templater::getInstance()->twig->load('catalog/catalog.twig');
//    return $template->render(['products' => $products]);
//}

function showProduct($id)
{
    $product = getProduct($id);

    if (!$product) {
        return '404';
    }

    $template = Templater::getInstance()->twig->load('catalog/product.twig');

    return $template->render(['product' => $product]);
}
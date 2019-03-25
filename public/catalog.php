<?php

namespace App;

use App\Classes\DB;
use App\Classes\Templater;

require_once '../config/config.php';

try {

    $perPage = 10;
    $page = (int)($_GET['page'] ?? 0);
    $page++;
    $start = $page * $perPage;
    $sql = "SELECT * FROM `products2` LIMIT $start, $perPage";
    $products = DB::getInstance()->fetchAll($sql);
    $template = Templater::getInstance()->twig->load('catalog/catalog.html');

    echo $template->render(['products' => $products, 'page' => $page]);


} catch (\Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}
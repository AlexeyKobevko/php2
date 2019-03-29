<?php

namespace App;

use App\Classes\DB;
use App\Classes\Templater;

require_once '../config/config.php';

$perPage = 10;
$rowProducts = !empty($_GET['rowProducts']);
$templateName = $rowProducts ? 'catalog/catalogList.html' : 'catalog/catalog.html';
$page = (int)($_GET['page'] ?? 0);
$start = $page * $perPage;
$sql = "SELECT * FROM `products2` LIMIT $start, $perPage";

try {

    $template = Templater::getInstance()->twig->load($templateName);
    $products = DB::getInstance()->fetchAll($sql);

    echo $template->render(['products' => $products]);


} catch (\Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}
<?php

namespace App;

use App\Classes\DB;
use App\Classes\Templater;
use \PDO;

require_once '../config/config.php';

$twig = Templater::getInstance()->twig;
$db = DB::getInstance();

try {

    $template = $twig->load('gallery/galleryItem.html');

    $id = isset($_GET['id']) ? $_GET['id'] : false;
    $id = (int)$id;

    $data = $db->fetchAll("SELECT * FROM images2 WHERE `id` = $id");

    $views = $data[0]->views + 1;
    $db->update("UPDATE `images2` SET `views` = $views WHERE `id` = $id");

    echo $template->render([
        'nav' => $nav,
        'data' => $data[0],
    ]);

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}

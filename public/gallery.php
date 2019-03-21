<?php

namespace App;

use App\Classes\DB;
use App\Classes\Templater;
use \PDO;

require_once '../config/config.php';

$twig = Templater::getInstance()->twig;
$db = DB::getInstance();

try {

    $template = $twig->load('gallery/gallery.html');

    $data = $db->fetchAll("SELECT * FROM `images2` ORDER BY `images2`.`views` DESC");

    echo $template->render([
        'nav' => $nav,
        'data' => $data,
    ]);

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}

<?php

namespace App;

use App\Classes\DB;
use App\Classes\Templater;
use \PDO;

require_once '../config/config.php';

try {

    if (!isset($_GET['id'])) {
        throw new \Exception('Id не передан');
    }

    $id = (int)$_GET['id'];

    $image = DB::getInstance()->fetchOne("SELECT * FROM images2 WHERE `id` = $id");
    if (!$image) {
        throw new \Exception('Изображение не найдено');
    }

    DB::getInstance()->exec("UPDATE `images2` SET `views` = `views` + 1 WHERE `id` = :id", ['id' => $id]);

    $image->views++;

    $template = Templater::getInstance()->twig->load('gallery/image.html');
    echo $template->render([
        'image' => $image,
    ]);

} catch (\Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}

<?php

namespace App;

use App\Classes\Templater;

require_once '../config/config.php';

try {

    $template = Templater::getInstance()->twig->load('index.html');

    echo $template->render([
        'title' => 'Главная',
        'nav' => $nav,
    ]);

} catch (\Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}

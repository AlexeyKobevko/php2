<?php

require_once '../config/config.php';

try {

    if (!isset($_GET['id'])) {
        throw new \Exception('Id не найден');
    }
    $id = (int)$_GET['id'];

    echo showProduct($id);

} catch (\Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}
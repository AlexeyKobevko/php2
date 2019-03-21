<?php

require_once '../config/config.php';

try {

    $loader = new \Twig\Loader\FilesystemLoader('../templates');

    $twig = new \Twig\Environment($loader);

    $template = $twig->load('gallery/galleryItem.html');

    $dbh = new PDO('mysql:dbname=geek_brains_shop;host=localhost', 'geek_brains', '789');

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = isset($_GET['id']) ? $_GET['id'] : false;
    $id = (int)$id;

    $sql = "SELECT * FROM images2 WHERE `id` = $id";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $data = $sth->fetchAll(PDO::FETCH_OBJ);

    $views = $data[0]->views + 1;
    $sth = $dbh->prepare("UPDATE `images2` SET `views` = $views WHERE `id` = $id");
    $sth->execute();

    unset($dbh);

    echo $template->render([
        'nav' => $nav,
        'data' => $data[0],
    ]);

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}

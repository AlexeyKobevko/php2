<?php

require_once '../config/config.php';

try {

    $loader = new \Twig\Loader\FilesystemLoader('../templates');

    $twig = new \Twig\Environment($loader);

    $template = $twig->load('gallery/gallery.html');

    $dbh = new \PDO('mysql:dbname=geek_brains_shop;host=localhost', 'geek_brains', '789');

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM `images2` ORDER BY `images2`.`views` DESC";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $data = $sth->fetchAll(PDO::FETCH_OBJ);
    unset($dbh);

    echo $template->render([
        'nav' => $nav,
        'data' => $data,
    ]);

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}

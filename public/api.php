<?php

require_once '../config/config.php';

function error($error_text)
{
    echo $error_text;
    exit();
}

//if (empty($_GET['apiMethod'])) {
//    error('Не передан apiMethod');
//    exit();
//}

function success($data = true)
{
    echo $data;
    exit();
}

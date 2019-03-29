<?php


require_once '../config/config.php';

try {

    var_dump($_GET);

} catch (\Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TEST</title>
    <link rel="stylesheet" href="/styles/main.css">
</head>
<body>
<button class="btn" data-lastId=0 data-nextId=5>SEND</button>

<script src="/js/jquery.min.js"></script>
<script src="/js/test.js"></script>
</body>
</html>

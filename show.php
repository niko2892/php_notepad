<?php
require 'database/querybuilder.php'; //подключаю файл с клиентом

$db = new QueryBuilder;

$task = $db->getTask($_GET["id"]);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?=$task['title'];?></h1>
                <p>
                    <?=$task['content'];?>
                </p>
                <a href="index.php">Go back</a>
            </div>
        </div>
    </div>
</body>
</html>
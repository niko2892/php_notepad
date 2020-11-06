<?php
//Использую класс PDO для работы с БД
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');//Подключаю БД
$sql = "SELECT * FROM tasks WHERE id=:id"; // формирую запрос для БД
$statement = $pdo->prepare($sql); //Подготавливаю запрос
$statement->bindParam(":id", $_GET["id"]);
$statement->execute(); // Выполняю запрос  
$task = $statement->fetch(PDO::FETCH_ASSOC); //Записываю в массив tasks данные из БД в виде ассоциативного массива
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
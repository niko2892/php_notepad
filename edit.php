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
                <h1>Edit task</h1>
                <form action="update.php?id=<?=$task['id'];?>" method="post">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" value="<?=$task['title'];?>">
                    </div>

                    <div class="form-group">
                        <textarea name="content" class="form-control"><?=$task['content'];?></textarea>
                    </div>

                    <div class="form-group">
                       <button class="btn btn-warning" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php

class QueryBuilder
{
    function getAllTasks()
    {
        //Использую класс PDO для работы с БД
        $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');//Подключаю БД
        $sql = "SELECT * FROM tasks"; // формирую запрос для БД
        $statement = $pdo->prepare($sql); //Подготавливаю запрос
        $statement->execute(); // Выполняю запрос  
        $tasks = $statement->fetchAll(PDO::FETCH_ASSOC); //Записываю в массив tasks данные из БД в виде ассоциативного массива
        return $tasks;
    }

    function addTask($data)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "root");
        $sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)"; //готовлю метки title u content для загрузки в БД
        $statement = $pdo->prepare($sql); //готовлю запрос
        $statement->execute($data); //выполняю запрос (возвращает true/false. Проверка через var_dump)
                                    //execute самостоятельно привязвает метки к значениям массива из $_POST
    }

    function updateTask($data)
    {
        $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "root");
        $sql = 'UPDATE tasks SET title=:title, content=:content WHERE id=:id';
        $statement= $pdo->prepare($sql);
        $statement->execute($data);
    }

    function getTask($id)
    {
        //Использую класс PDO для работы с БД
        $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');//Подключаю БД
        $sql = "SELECT * FROM tasks WHERE id=:id"; // формирую запрос для БД
        $statement = $pdo->prepare($sql); //Подготавливаю запрос
        $statement->bindParam(":id", $id);
        $statement->execute(); // Выполняю запрос  
        $task = $statement->fetch(PDO::FETCH_ASSOC); //Записываю в массив tasks данные из БД в виде ассоциативного массива
        return $task;
    }

    function deleteTask($id)
    {
        $sql = "DELETE FROM tasks WHERE id=:id";
        $pdo = new PDO("mysql:host=localhost; dbname=test", "root", "root");
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}

?>
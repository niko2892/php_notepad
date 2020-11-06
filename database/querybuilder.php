<?php

class QueryBuilder
{
    public $pdo; //создаю поля класса. Сюда запишется параметр из конструктора через this

    function __construct() //выполняется во время создания экземпляра класса. Сюда передаются аргументы при вызове класса
    {
        //Использую класс PDO для работы с БД
        $this->pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');//Подключаю БД
    }

    function all($table)
    {
        $sql = "SELECT * FROM $table"; // формирую запрос для БД
        $statement = $this->pdo->prepare($sql); //Подготавливаю запрос
        $statement->execute(); // Выполняю запрос  
        $results = $statement->fetchAll(PDO::FETCH_ASSOC); //Записываю в массив tasks данные из БД в виде ассоциативного массива
        return $results;
    }

    function store($table, $data)
    {
        $keys = array_keys($data); //достаю ключи из массива data (они в массиве)
        $stringOfKeys = implode(',',$keys); //формирую строку из полученного массива ключей (через запятую)
        $placeholders = ":".implode(', :',$keys); //формирую метки
        $sql = "INSERT INTO $table ($stringOfKeys) VALUES ($placeholders)"; //готовлю метки title u content для загрузки в БД
        $statement = $this->pdo->prepare($sql); //готовлю запрос
        $statement->execute($data); //выполняю запрос (возвращает true/false. Проверка через var_dump)
                                    //execute самостоятельно привязвает метки к значениям массива из $_POST
    }

    function update($table, $data)
    {
        $fields = ''; //создаю строку для хранения ключей массива data
        foreach ($data as $key => $value) {
            $fields .= $key. "=:".$key.","; //записываю все(см на точку - конкотенация) ключи массива data в строку fields
        }
        $fields = rtrim($fields, ","); //удаляю запятую справа полученной в цикле строки

        $sql = "UPDATE $table SET $fields WHERE id=:id";
        $statement= $this->pdo->prepare($sql);
        $statement->execute($data);
    }

    function findById($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id=:id"; // формирую запрос для БД
        $statement = $this->pdo->prepare($sql); //Подготавливаю запрос
        $statement->bindParam(":id", $id);
        $statement->execute(); // Выполняю запрос  
        $result = $statement->fetch(PDO::FETCH_ASSOC); //Записываю в массив tasks данные из БД в виде ассоциативного массива
        return $result;
    }

    function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}

?>
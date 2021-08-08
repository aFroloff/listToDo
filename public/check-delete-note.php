<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"
    ];
    $todo = new PDO("mysql:host=localhost;dbname=todo-list;charset=utf8mb4", 'root', '', $options);
    if(isset($_POST['delNoteBtn'])){
        $id = $_POST['delNoteBtn']; /* получаем id заметки через атрибут value у кнопки с удалением*/
        $sql = 'DELETE FROM notes WHERE id = ?';
        $query = $todo->prepare($sql);
        $query->execute([$id]); /* удаление заметки*/
        header('location: index.php');
    }
?>
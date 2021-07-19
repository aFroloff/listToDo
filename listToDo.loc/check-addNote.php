<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"
    ];
    $todo = new PDO("mysql:host=localhost;dbname=todo-list;charset=utf8mb4", 'root', '', $options);
    $noteName = $_POST["note-title"];
    $noteDescr = $_POST["note-description"];
    $date = date("y.m.d");
    if(trim($noteName) != '' && trim($noteDescr) != ''){ /*!trim() не работает корректно*/
        $sql = 'INSERT notes (name, description, date) 
        VALUES (?, ?, ?)';
        $query = $todo->prepare($sql);
        $query->execute([$noteName, $noteDescr, $date]);
    }
    header('location: addNote.php');
?>
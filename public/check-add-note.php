<?php
    session_start();
    session_unset();  /* обновление значений */

    error_reporting(E_ALL);
    ini_set("display_errors", 1);                    
    $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"
    ];

    $todo = new PDO("mysql:host=localhost;dbname=todo-list;charset=utf8mb4", 'root', '', $options);
    $noteName = trim($_POST["note-title"]);
    $noteDescr = trim($_POST["note-description"]);
    $date = date("y.m.d");

    $_SESSION['note-title'] = $noteName;
    $_SESSION['note-description'] = $noteDescr;

    function redirectToBack(){
        header('location: add-note.php');
        exit;
    }

    if($noteName == ''){
        $_SESSION['note-title-req'] = "Поле не должно быть пустым !";
        redirectToBack();
    }
    else if($noteDescr == ''){
        $_SESSION['note-description-req'] = "Поле не должно быть пустым !";
        redirectToBack();
    }
    else{ /*  if($noteName != '' && $noteDescr != '') */
        $sql = 'INSERT notes (name, description, date) 
        VALUES (?, ?, ?)';
        $query = $todo->prepare($sql);
        $query->execute([$noteName, $noteDescr, $date]);
        $_SESSION['note-success-req'] = "Заметка успешно добавлена !";
        redirectToBack();
    }
?>
<?php
    session_start();
    unset($_SESSION['requirements']);  /* обновление значений */
    /* $_SESSION['requirements'][] - массив который хранит ошибки */

    require_once "../included/database-connect.php"; /* $todo - база данных */
    
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
        $_SESSION['requirements'][0] = "Поле не должно быть пустым !";
        redirectToBack();
    }
    else if($noteDescr == ''){
        $_SESSION['requirements'][1] = "Поле не должно быть пустым !";
        redirectToBack();
    }
    else{ /*  if($noteName != '' && $noteDescr != '') */
        $sql = 'INSERT notes (name, description, date) 
        VALUES (?, ?, ?)';
        $query = $todo->prepare($sql);
        $query->execute([$noteName, $noteDescr, $date]);
        $_SESSION['requirements'][2] = "Заметка успешно добавлена !";
        redirectToBack();
    }
?>
<?php
    session_start();
    unset($_SESSION['error']);  /* обновление значений */
    unset($_SESSION['messages']);  /* обновление значений */
    /* $_SESSION['messages'][] - массив который хранит ошибки */

    require_once "../included/database-connect.php"; /* $db - база данных */
    
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
        $_SESSION['error'] = "Поле не должно быть пустым !"; 
        /*добавление текста в конец массива*/
        redirectToBack();
    }
    else if($noteDescr == ''){
        $_SESSION['error'] = "Поле не должно быть пустым !";
        redirectToBack();
    }
    else{ /*  if($noteName != '' && $noteDescr != '') */
        $sql = 'INSERT notes (name, description, date) 
        VALUES (?, ?, ?)';
        $query = $db->prepare($sql);
        $query->execute([$noteName, $noteDescr, $date]);
        $_SESSION['messages'][] = "Заметка успешно добавлена !";
        redirectToBack();
    }
?>
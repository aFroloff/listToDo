<?php
    require_once "../included/database-connect.php"; /* $db - база данных */
    if(isset($_POST['delNoteBtn'])){
        $id = $_POST['delNoteBtn']; /* получаем id заметки через атрибут value у кнопки с удалением*/
        $sql = 'DELETE FROM notes WHERE id = ?';
        $query = $db->prepare($sql);
        $query->execute([$id]); /* удаление заметки*/
        header('location: index.php');
    }
?>
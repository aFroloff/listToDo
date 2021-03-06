<?php
    session_start();
    $title = "Добавление заметки";
    require_once "../included/header.php";
?>
<div class="main">
    <h2>Добавление заметки</h2>
    <form class="form-addNote" action="check-add-note.php" method="post">
        <div class="form-field">
            <label for="note-title">Название заметки</label>
            <textarea name="note-title" 
            type="text"
            id="note-title" 
            rows="1" 
            maxlength="15"
            ><?=$_SESSION['note-title']?></textarea>
            <!--если написать закрывающий и открывающий тег <textarea>
            не в одну в одну строку, то не возникнут
            проблемы с лишними пробелами внутри поля-->

            <!--вывод/не вывод предупрежения о названии заметки-->
            <?php
                if($_SESSION['note-title'] == ''){
            ?>
                <p class="requirements"><?=$_SESSION['error']?></p>
            <?php } ?>
        </div><br>
        <div class="form-field">
            <label for="note-description">Описание заметки</label>
            <textarea name="note-description" 
            type="text" 
            id="note-description" 
            rows="1" 
            maxlength="75"
            ><?=$_SESSION['note-description']?></textarea>
            
            <!--вывод/не вывод предупрежения об описании заметки, или же
            сообщения об успешном заполнении-->
            <?php
                if($_SESSION['note-description'] == ''){
            ?>
                    <p class="requirements"><?= $_SESSION['error'] ?></p>
            <?php } 
                foreach($_SESSION['messages'] ?? [] as $message){
                    if($message == "Заметка успешно добавлена !"){ ?>
                        <p class="successNote"><?=$message?></p>
            <?php
                }   
                    } ?>
        </div>
        <div>
            <button type="submit" class="btn btn-addNote">Добавить</button>
            <a href="/">
                <button type="button" class="btn btn-backToNotes">
                    К заметкам</button>
            </a>
        </div>
    </form>
    <a href="add-note.php" class="addNote">+</a>
</div>

</body>
</html>
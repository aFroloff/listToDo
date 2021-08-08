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
            ><?=$_SESSION['note-title']?></textarea>
            <!--если написать закрывающий и открывающий тег <textarea>
            не в одну в одну строку, то не возникнут
            проблемы с лишними пробелами внутри поля-->

            <!--вывод/не вывод предупрежений о заметке-->
            <?php
                if(isset($_SESSION['note-title-req'])){
            ?>
                <p class="requirements"><?=$_SESSION['note-title-req']?></p>
            <?php } ?>
        </div><br>
        <div class="form-field">
            <label for="note-description">Описание заметки</label>
            <textarea name="note-description" 
            type="text" 
            id="note-description" 
            rows="1"
            ><?=$_SESSION['note-description']?></textarea>
            
            <!--вывод/не вывод предупрежений о заметке, а также
            сообщения об успешном заполнении-->
            <?php
                if(isset($_SESSION['note-description-req'])){
            ?>
                <p class="requirements"><?= $_SESSION['note-description-req'] ?></p>
            <?php } 
                if(isset($_SESSION['note-success-req'])) { ?>
                <p class="successNote"><?=$_SESSION['note-success-req']?></p>
            <?php } ?>
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
<?php
    $title = "Добавление заметки";
    require_once "header.html";
?>
<div class="main">
    <h2>Добавление заметки</h2>
    <form class="form-addNote" action="check-addNote.php" method="post">
        <div class="form-field">
            <label for="note-title">Название заметки</label>
            <textarea name="note-title" type="text" id="note-title" rows="1"></textarea>
        </div><br>
        <div class="form-field">
            <label for="note-description">Описание заметки</label>
            <textarea name="note-description" type="text" id="note-description" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-addNote">Добавить</button>
            <a href="/">
                <button type="button" class="btn btn-backToNotes">
                    К заметкам</button>
            </a>
        </div>
    </form>
    <a href="addNote.php" class="addNote">+</a>
</div>

</body>
</html>
<?php
    session_start();
    session_unset();
        /*чтобы при повторном переходе на страницу добавления заметки
        предумпреждения стирались */
    $title = "List To Do";
    $id = 0; /* отвечает за id каждой записи */
    require_once "../included/header.php";
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $todo = new mysqli("localhost", "root", "", "todo-list");
    $todo->query("SET NAMES 'utf8'");
    $notes = $todo->query("SELECT * FROM `notes`");

    $todo->close();
?>

<div class="main">
    <h2>Мои Заметки</h2>
    <div class="notes">
        <ul>
            <?php
                if($notes->num_rows > 0){
                    while($row = $notes->fetch_assoc()){
                        $id = $row['id'];
                        $date = $row['date'];
                        $date = array_reverse(explode("-", $date), true);
                        $normDate = implode('.', $date);
            ?>
                        <li>
                            <form action='check-delete-note.php' method='post'>
                                <button type='submit' 
                                class='btn btn-deleteNote'
                                name = 'delNoteBtn' 
                                value = <?= $id ?>
                                >Выполено</button>
                            </form>
                            <?= $row['name'].' (' .$normDate. ')'?>
                            <div class='noteDescripiton'>
                                <?=$row['description']?>
                            </div>
                        </li>
            <?php 
                    }
                }
            ?>
        </ul>
    </div>
    <a href="add-note.php" class="addNote">+</a>
    </div>
</body>
</html>
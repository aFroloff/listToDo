<?php
    session_start();
    unset($_SESSION); 
        /*чтобы при повторном переходе на страницу добавления заметки
        предупреждения стирались*/
    $title = "List To Do";
    $id = 0; /* отвечает за id каждой записи */
    require_once "../included/header.php";
    require_once "../included/database-connect.php"; /* $todo - база данных */

    $notes = $todo->prepare('SELECT * FROM notes');
    $notes->execute();
?>

<div class="main">
    <h2>Мои Заметки</h2>
    <div class="notes">
        <ul>
            <?php
                /* не PDO
                    if($notes->num_rows > 0){
                    while($row = $notes->fetch_assoc()){
                        $id = $row['id'];
                        $date = $row['date'];
                        $date = array_reverse(explode("-", $date), true);
                        $normDate = implode('.', $date);*/
                while ($row = $notes->fetch()){
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
            ?>
        </ul>
    </div>
    <a href="add-note.php" class="addNote">+</a>
    </div>
</body>
</html>
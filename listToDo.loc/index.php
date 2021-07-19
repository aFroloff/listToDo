<?php
    $title = "List To Do";
    $id = 0; /* отвечает за id каждой записи */
    require_once "header.html";
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
?>

<div class="main">
    <h2>Мои Заметки</h2>
    <div class="notes">
        <ul>
            <?php
                $todo = new mysqli("localhost", "root", "", "todo-list");
                $todo->query("SET NAMES 'utf8'");
                $result = $todo->query("SELECT * FROM `notes`");
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $id = $row['id'];
                        $date = $row['date'];
                        $date = array_reverse(explode("-", $date), true);
                        $normDate = implode('.', $date);
                        echo "<li>
                        <form action='check-deleteNote.php' method='post'>
                        <button type='submit' 
                        class='btn btn-deleteNote'
                        name = 'delNoteBtn' 
                        value='{$id}'
                        >Выполено</button>
                        </form>";
                        echo $row['name'].' ('.$normDate.')';
                        echo "<div class='noteDescripiton'>"
                        .$row['description']."</div>
                        </li>";
                    }
                }
            ?>
            <!--<li>
                <button class='btn btn-deleteNote'>Выполено</button>
                Title
                <div class=noteDescripiton>
                    Description
                </div>
            </li>-->
            
        </ul>
    </div>
    <a href="addNote.php" class="addNote">+</a>
<?php
$todo->close();
?>
</div>
</body>
</html>
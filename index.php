<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>To Do List</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <h1 id="headerText">To Do List</h1>
        <a href="add.php" id="link">Add Tasks</a>

        <?php
            include "db_connect.php";

            $tasks = $pdo->query("SELECT * FROM tasks")->fetchAll();
            foreach($tasks as $row){
                $id = $row["id"];
                $title = $row["title"];
                $description = $row["descr"];
                $dueDate = $row["due_date"];
                $status = $row["stat"];

                echo "
                    <div id='taskContainer'>
                        <h3 id='taskText'>$title</h3>
                        <p id='taskText'>$description</p>
                        <p id='taskText'>Due: $dueDate</p>
                        <p id='taskText'>Status: $status</p>
                        <form action='edit.php' method='post' id='buttons'>
                            <input type='text' name='id' value='$id' style='display: none;'>
                            <input type='submit' value='edit'>
                        </form>
                        <form action='delete.php' method='post' id='buttons'>
                            <input type='text' name='id' value='$id' style='display: none;'>
                            <input type='submit' value='delete'>
                        </form><br><br>
                    </div>
                ";
            }
        ?>
    </body>
</html>
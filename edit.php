<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Edit Task</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="edit.css">
    </head>
    <body>
        <h1 id="headerText">Edit Task</h1><br>
        <a href="index.php" id="link">Back to Index</a><br><br>
        <form action='edit.php' method='post' id="inputForm">
            title: <input type='text' name='title'><br>
            description: <textarea name='description'></textarea><br>
            Due Date: <input type='date' name='dueDate'><br>
            Status: <select name="status">
                <option value="pending">pending</option>
                <option value="completed">completed</option>
            </select><br>
            <input type='submit' value='Edit Task'>
        </form>

        <?php
            include "db_connect.php";
            error_reporting(0);

            if($_POST["id"] != null){
                $_SESSION["id"] = $_POST["id"];
            }
            $id = $_SESSION["id"];
            $title = $_POST["title"];
            $description = $_POST["description"];
            $dueDate = $_POST["dueDate"];
            $status = $_POST["status"];

            if($title != null && $description != null && $dueDate != null){
                $row = [
                    "id" => $id,
                    "title" => $title,
                    "descr" => $description,
                    "dueDate" => $dueDate,
                    "stat" => $status
                ];
    
                $sql = "UPDATE tasks SET title=:title, descr=:descr, due_date=:dueDate, stat=:stat WHERE id=:id";
                $status = $pdo->prepare($sql)->execute($row);
            }
        ?>
    </body>
</html>
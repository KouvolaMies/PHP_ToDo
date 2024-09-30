<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Tasks</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="add.css">
    </head>
    <body>
        <h1 id="headerText">Add Tasks</h1>
        <a href="index.php" id="link">Back to Index</a><br><br>
        <form action="add.php" method="post" id="inputForm">
            title: <input type="text" name="title"><br>
            description: <textarea name="description"></textarea><br>
            Due Date: <input type="date" name="dueDate"><br>
            <input type="submit" value="Add Task">
        </form>

        <?php
            include "db_connect.php";
            error_reporting(0);

            $title = $_POST["title"];
            $description = $_POST["description"];
            $dueDate = $_POST["dueDate"];

            if($title != null && $description != null && $dueDate != null){
                $row = [
                    "title" => $title,
                    "descr" => $description,
                    "dueDate" => $dueDate
                ];
    
                $sql = "INSERT INTO tasks SET title=:title, descr=:descr, due_date=:dueDate";
                $status = $pdo->prepare($sql)->execute($row);
            }
        ?>
    </body>
</html>
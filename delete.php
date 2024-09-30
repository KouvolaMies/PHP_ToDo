<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Delete Tasks</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <a href="index.php">Back To Index</a>
        <?php
            include "db_connect.php";

            $id = $_POST["id"];
            $where = ['id' => $id];

            $pdo->prepare("DELETE FROM tasks WHERE id=:id")->execute($where);
            
            header("refresh:0; url=index.php");
        ?>
    </body>
</html>
<?php

declare(strict_types=1);
var_dump($_POST);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/app/Views/css/styles.css">
</head>
<body>
    <div>
        <h1>Todo</h1>
        <form action="/add" method="post">
            <input type="text" name="item" placeholder="Add new item">
            <br>
            <button type="submit">Add</button>
        </form>
    </div>
    <div>
        <ul>
            <?php
            $file = json_decode(file_get_contents('data.json'));
            foreach ($file as $item) {
                echo '<input type="checkbox" name="item" autocomplete="off"><label for="item">' . $item . '</label><br>';
            }
            ?>
        </ul>
    </div>
</body>
</html>

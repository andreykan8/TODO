<?php

declare(strict_types=1);
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
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
    <div class="input">
        <h1>Todo</h1>
        <form action="/add" method="post">
            <input type="text" name="item" placeholder="Add new item">
            <br>
            <button class="add-button" type="submit" name="add">Add</button>
        </form>
    </div>
    <p><?= $error; ?></p>
    <div class="list">
        <?php foreach($file as $item => $val) : ?>
            <form method="post" action="/delete">
                <p class="task"><?= $item ; ?></p>
                <input type="hidden" name="_method" value="DELETE"/>
                <br class="del-br">
                <button class="delete-button" type="submit" name="deletedItem" value="<?= $item ; ?>">X</button>
            </form>
        <?php endforeach ;?>
    </div>
</body>
</html>

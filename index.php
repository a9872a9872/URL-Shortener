<?php
require_once 'vendor/autoload.php';
require_once 'Database.php';

$db = new Database();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>URL Shortener</title>
</head>
<body>
<h1>URL Shortener</h1>
<form action="./index.php" method="POST">
    <label>url:
        <input type="text" name="title">
    </label>
    <input type="submit" name="Submit" value="送出">
</form>
</body>
</html>

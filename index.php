<?php
require_once 'vendor/autoload.php';
require_once 'Database.php';
require_once 'Url.php';

$db = new Database();

if (isset($_GET['code'])) {
    print_r($_GET['code']);
    $url = $db->getUrl($_GET['code'])->fetch_assoc()['url'];
    header("location:" . $url);
}

if (isset($_POST['url'])) {
    $url = new Url();
    $result = '';
    if ($url->checkUrlVerify($_POST['url'])) {
        $code = $db->store($_POST['url']);
        $result = $_ENV['APP_URL'] . '/' . $code;
    } else {
        $result = "Please input a valid URL";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>URL Shortener</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body class="bg-secondary text-white">
<div class="container mt-5">
    <h1 class="text-center mb-3">URL Shortener</h1>
    <form class="input-group mb-3" action="./index.php" method="POST">
        <input class="form-control" type="text" name="url" placeholder="input the url here">
        <input class="input-group-text bg-primary" type="submit" name="Submit" value="送出">
    </form>
    <?php
    if (isset($result)) {
        echo '<div class="alert alert-success" role="alert">' . $result . '</div>';
    }
    ?>
</div>
</body>
</html>

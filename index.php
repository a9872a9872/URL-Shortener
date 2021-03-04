<?php
require_once 'vendor/autoload.php';
require_once 'Database.php';

$db = new Database();

if (!empty($_GET['code'])) {
    $url = $db->getUrl($_GET['code'])->fetch_assoc()['url'];
    header("location:" . $url);
}

if (!empty($_POST['url'])) {
    $code = $db->store($_POST['url']);
    $new_url = $_ENV['HOST_URL'] . '/' . $code;
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
</head>
<body>
<h1>URL Shortener</h1>
<form action="./index.php" method="POST">
    <label>url:
        <input type="text" name="url">
    </label>
    <input type="submit" name="Submit" value="送出">
</form>
<?php
if (isset($new_url)) {
    echo $new_url;
}
?>
</body>
</html>

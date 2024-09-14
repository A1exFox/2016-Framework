<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>DEFAULT | <?= $title ?></title>
</head>
<body>
<h1>Layout: Default</h1>

<?= $content ?>

<?= debug(\vendor\core\Db::$countSql) ?>
<?= debug(\vendor\core\Db::$queries) ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>
</body>
</html>
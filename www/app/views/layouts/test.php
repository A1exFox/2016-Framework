<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/fav/favicon-16x16.png">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>TEST | <?= $title ?></title>
</head>
<body>
<div class="wrapper">
    <h1>Layout: Test</h1>

    <?= $content ?>

    <?php //debug(\vendor\core\Db::$countSql) ?>
    <?php //debug(\vendor\core\Db::$queries) ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>
</body>
</html>
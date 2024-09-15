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
<div class="wrapper">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <?php foreach ($menu as $item): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $item->id ?>"><?= $item->title ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>
    <h1>Layout: Default</h1>

    <?= $content ?>

    <?php //debug(\vendor\core\Db::$countSql) ?>
    <?php //debug(\vendor\core\Db::$queries) ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/fav/favicon-16x16.png">
    <?php \vendor\core\base\View::getMeta() ?>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
<div class="wrapper">
    <?php if(!empty($menu)): ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/page/about">About</a>
                        </li>
                        <?php foreach ($menu as $item): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $item->id ?>"><?= $item->title ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </nav>
    <?php endif; ?>
    <h1>Layout: Admin</h1>

    <?= $content ?>

    <?php //debug(\vendor\core\Db::$countSql) ?>
    <?php //debug(\vendor\core\Db::$queries) ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>
<?= $this->scripts ?>
</body>
</html>
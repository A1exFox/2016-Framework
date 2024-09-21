<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/fav/favicon-16x16.png">
    <?php \fw\core\base\View::getMeta() ?>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
<div class="container">
    <ul class="nav nav-underline nav-fill">
        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/page/about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin">Admin</a></li>
        <li class="nav-item"><a class="nav-link" href="/user/signup">Sign up</a></li>
        <li class="nav-item"><a class="nav-link" href="/user/login">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="/user/logout">Logout</a></li>
    </ul>

    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['error']; unset($_SESSION['error']) ?>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['success']; unset($_SESSION['success']) ?>
        </div>
    <?php endif; ?>

    <?php debug($_SESSION); ?>

    <?= $content ?>

    <?php //debug(\fw\core\Db::$countSql) ?>
    <?php //debug(\fw\core\Db::$queries) ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>
<?= $this->scripts ?>
</body>
</html>
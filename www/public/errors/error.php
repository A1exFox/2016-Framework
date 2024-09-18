<?php
/**
 * @var string $errtype
 * @var string $errstr
 * @var string $errfile
 * @var string $errline
 * @var int $errcode
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $errcode ?>| Service unavailable</title>
    <?php if(DEBUG): ?>
        <style>
            tr:not(:last-child) td {
                padding-bottom: 1rem;
            }
            td:not(:last-child) {
                padding-right: 1rem;
            }
        </style>
    <?php endif; ?>
</head>
<body>
<?php if(DEBUG): ?>
<h1><?= $errtype ?></h1>
<table>
    <tr>
        <td>Message:</td>
        <td><?= $errstr ?></td>
    </tr>
    <tr>
        <td>File:</td>
        <td><?= $errfile ?></td>
    </tr>
    <tr>
        <td>Line:</td>
        <td><?= $errline ?></td>
    </tr>
    <tr>
        <td>Response code:</td>
        <td><?= $errcode ?></td>
    </tr>
</table>
<?php else: ?>
<h1>Service unavailable</h1>
<?php endif; ?>
</body>
</html>
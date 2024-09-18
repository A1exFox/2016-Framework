<?php
/**
 * @var string $errtype
 * @var string $errno
 * @var string $errname
 * @var string $errstr
 * @var string $errfile
 * @var string $errline
 * @var string $errcode
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $errcode ?> | Service unavailable</title>
    <?php if(DEBUG): ?>
        <style>
            body {
                font-family: monospace, sans-serif;
            }
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
<h1><?php echo "{$errtype}: {$errname} ({$errno})"; ?></h1>
<table>
    <tr>
        <td>Message:</td>
        <td><strong><?= $errstr ?></strong></td>
    </tr>
    <tr>
        <td>File:</td>
        <td><strong><?= $errfile ?></strong></td>
    </tr>
    <tr>
        <td>Line:</td>
        <td><strong><?= $errline ?></strong></td>
    </tr>
    <tr>
        <td>Response code:</td>
        <td><strong><?= $errcode ?></strong></td>
    </tr>
</table>
<?php else: ?>
<h1>Service unavailable. Sorry...</h1>
<?php endif; ?>
</body>
</html>
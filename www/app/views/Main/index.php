<button class="btn btn-primary" id="send">Button</button>
<p>
    <?php new \vendor\widgets\menu\Menu([
            'tpl' => WWW . '/menu/select.php',
            'container' => 'select',
            'class' => 'my-select',
            'table' => 'categories',
            'cache' => '60',
            'cache_key' => 'fw_menu_select',
    ]); ?>
</p>
<p>
    <?php new \vendor\widgets\menu\Menu([
        'tpl' => WWW . '/menu/my_menu.php',
        'class' => 'my-menu',
        'table' => 'categories',
        'cache' => '120',
        'cache_key' => 'fw_menu_list',
    ]); ?>
</p>
<?php if(!empty($posts)): ?>
    <div class="container">
        <?php foreach ($posts as $post): ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['title'] ?></h5>
                    <p class="card-text"><?= $post['text'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<script src="js/script.js"></script>
<code>View: <?= __FILE__?></code>
<script>
    $('#send').click(function () {
        $.ajax({
            url: '/main/test',
            type: 'post',
            data: {'id': 2},
            success: function (res) {
                console.log(res)
            },
            error: function () {
                alert('Error')
            },
        })
    })
</script>
<pre>Example</pre>
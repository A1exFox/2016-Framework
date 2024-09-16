<button class="btn btn-primary" id="send">Button</button>
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
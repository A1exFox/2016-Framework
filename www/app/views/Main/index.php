    <?php if(!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
    <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $post['title'] ?></h5>
                <p class="card-text"><?= $post['text'] ?></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
<code>View: <?= __FILE__?></code>
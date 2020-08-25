<main class="page-blog">
    <div class="container">
        <div class="page-blog__header">
            <h2 class="heading">Блог </h2>
        </div>
        <div class="page-blog__posts">
            <?php foreach ($posts as $post) : ?>
                <div class="card-post">
                    <div class="card-post__img">
                        <a href="<?php echo HOST . "blog/{$post['id']}"; ?>">
                            <img src="<?= HOST ?>usercontent/blog/<?php echo empty($post['cover_small']) ? 'noPhoto.jpg' : $post['cover_small']; ?>" alt="<?= $post['cover-small'] ?>" />
                        </a>
                    </div>
                    <h4 class="card-post__title"> 
                        <a href="<?php echo HOST . "blog/{$post['id']}"; ?>">
                            <?= $post['title'] ?></a>
                    </h4>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="page-blog__pagination">
            <?php include ROOT . "templates/_parts/_pagination.tpl"?>
        </div>
    </div>
</main>
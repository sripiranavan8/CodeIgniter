<h1><?= $title ?></h1>
<?php foreach ($posts as $post) : ?>
    <div class="row mb-3">
        <div class="col-md-3">
            <img class="post-thumb" src="<?php echo site_url(); ?>/assets/images/posts/<?php echo $post['post_image']; ?>" alt="">
        </div>
        <div class="col-md-9">
            <h4><?php echo $post['title']; ?></h4>
            <small class="post-date"><?php echo $post['created_at']; ?> in <strong><?php echo $post['name']; ?></strong></small>
            <p><?php echo word_limiter($post['body'], 60); ?></p>
            <p><a class="btn btn-info" href="<?php echo site_url('/posts/' . $post['slug']); ?>">Read More</a></p>
        </div>
    </div>
<? endforeach; ?>
<div class='pagination-link'>
    <?php
    echo $this->pagination->create_links();
    ?>
</div>
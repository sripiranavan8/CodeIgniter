<h2><?= $title ?></h2>
<ul class="list-group">
    <?php foreach ($categories as $category) : ?>
        <li class="list-group-item">
            <a href="<?php echo site_url('/categories/posts/' . $category['id']); ?>"><?php echo $category['name']; ?></a>
            <?php if ($this->session->userdata('user_id') == $category['user_id']) : ?>
                <form action="<?php base_url(); ?>categories/delete/<?php echo $category['id']; ?>" method="post" class="cat-delete">
                    <input type="submit" value="[X]" class="btn-link text-danger">
                </form>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>
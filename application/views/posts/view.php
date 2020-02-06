<h2><?php echo $post['title']; ?></h2>
<small class="post-date"><?php echo $post['created_at']; ?></small>
<div class="text-center">
    <img class="post-view-image" src="<?php echo site_url(); ?>/assets/images/posts/<?php echo $post['post_image']; ?>" alt="">
</div>
<div class="post-body">
    <?php echo $post['body']; ?>
</div>
<?php if($this->session->userdata('user_id') == $post['user_id']) : ?>
<hr>
<a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>" class="btn btn-warning float-left">Edit</a>
<?php echo form_open('/posts/delete/' . $post['id']); ?>
<input type="submit" value="Delete" class="btn btn-danger">
</form>
<?php endif; ?>
<hr>
<h3>Comments</h3>
<?php if ($comments) :
    foreach ($comments as $comment) :
?>
    <div class="alert alert-dismissible alert-light">
        <h5><?php echo $comment['body']; ?><small><strong>[by <?php echo $comment['name']; ?>]</strong></small></h5>
    </div>
    <?php endforeach;
else : ?>
    <p>No Comments to Display</p>
<?php endif; ?>
<hr>
<h3>Add Comments</h3>
<?php
echo validation_errors();
echo form_open('comments/create/' . $post['id']) ?>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control">
</div>
<div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" class="form-control"></textarea>
</div>
<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
<button class="btn btn-info" type="submit">Submit</button>
</form>
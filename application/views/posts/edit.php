<h4><?= $title ?></h4>

<?php echo validation_errors();
echo form_open('posts/update'); ?>
<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
<fieldset>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $post['title']; ?>">
    </div>
    <div class="form-group">
        <label for="body">Blog Body</label>
        <textarea id="editor" class="form-control" name="body" rows="3"><?php echo $post['body']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="exampleSelect1">Category</label>
        <select class="form-control" name="category">
            <?php foreach ($categories as $category) :
                if ($post['category'] === $category['id']) { ?>
                    <option selected value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                <?php
                } else { ?>
                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php
                }
            endforeach ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</fieldset>
</form>
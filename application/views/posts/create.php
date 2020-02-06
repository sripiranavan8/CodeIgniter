<h4><?= $title ?></h4>

<?php echo validation_errors();
echo form_open_multipart('posts/create'); ?>
<fieldset>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label for="body">Blog Body</label>
        <textarea id="editor" class="form-control" name="body" placeholder="Enter the Blog Body here..." rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleSelect1">Category</label>
        <select class="form-control" name="category">
            <option selected disabled>Please Select a Category</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="custom-file">
                <label class="custom-file-label" for="postimage">Upload Image</label>
                <input type="file" class="custom-file-input" name="userfile" size="20">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</fieldset>
</form>
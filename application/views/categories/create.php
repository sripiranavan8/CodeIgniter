<h2><?= $title ?></h2>
<?php
    echo validation_errors();
    echo form_open_multipart('categories/create');
?>
<fieldset>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</fieldset>
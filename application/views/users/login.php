<h3 class="text-center"><?= $title ?></h3>
<?php
    echo validation_errors();
    echo form_open('users/login');
?>
<div class="row">
    <div class="col-md-4 offset-4">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter Username" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control">
        </div>
        <button type="submit" class="btn btn-info btn-block">Login</button>
    </div>
</div>
<?php echo form_close(); ?>
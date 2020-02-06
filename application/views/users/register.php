<h3><?= $title ?></h3>
<?php echo validation_errors();
   echo form_open('users/register');
?>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">
</div>
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" placeholder="Enter Username" class="form-control">
</div>
<div class="form-group">
    <label for="zipcode">Zip Code</label>
    <input type="text" name="zipcode" id="zipcode" placeholder="Enter the zipcode" class="form-control">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Enter Email Address" class="form-control">
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control">
</div>
<div class="form-group">
    <label for="password2">Confirm Password</label>
    <input type="password" name="password2" id="password2" placeholder="Retype the password" class="form-control">
</div>
<button type="submit" class="btn btn-info">SignUp</button>
<?php echo form_close(); ?>
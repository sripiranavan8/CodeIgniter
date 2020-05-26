<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha384-yrfSO0DBjS56u5M+SjWTyAHujrkiYVtRYh2dtB3yLQtUz3bodOeialO59u5lUCFF" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">ciBlog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>posts">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>categories">Category</a>
                </li>
                <?php if (!$this->session->userdata('logged_in')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a>
                    </li>
                <?php endif;
                if ($this->session->userdata('logged_in')) :
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>posts/create">Create New Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>categories/create">Create New Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <div class="container">
        <?php
        if ($this->session->flashdata('user_registered')) {
            echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>';
        }
        if ($this->session->flashdata('post_create')) {
            echo '<p class="alert alert-success">' . $this->session->flashdata('post_create') . '</p>';
        }
        if ($this->session->flashdata('post_update')) {
            echo '<p class="alert alert-success">' . $this->session->flashdata('post_update') . '</p>';
        }
        if ($this->session->flashdata('category_create')) {
            echo '<p class="alert alert-success">' . $this->session->flashdata('category_create') . '</p>';
        }
        if ($this->session->flashdata('post_delete')) {
            echo '<p class="alert alert-warning">' . $this->session->flashdata('post_delete') . '</p>';
        }
        if ($this->session->flashdata('login_failed')) {
            echo '<p class="alert alert-danger">' . $this->session->flashdata('login_failed') . '</p>';
        }
        if ($this->session->flashdata('login_success')) {
            echo '<p class="alert alert-success">' . $this->session->flashdata('login_success') . '</p>';
        }
        if ($this->session->flashdata('user_logout')) {
            echo '<p class="alert alert-success">' . $this->session->flashdata('user_logout') . '</p>';
        }
        if ($this->session->flashdata('category_delete')) {
            echo '<p class="alert alert-success">' . $this->session->flashdata('category_delete') . '</p>';
        }
        ?>
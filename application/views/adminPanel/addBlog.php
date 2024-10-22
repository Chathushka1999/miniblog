<!doctype html>
<html lang="ar" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel = "stylesheet" type="text/css" href="https://getbootstrap.com/docs/5.3/examples/dashboard/dashboard.css">

    <title>Dashboard</title>


</head>

<?php $this->load->view('adminPanel/header'); ?>


<div class="container-fluid">
  <div class="row">
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="<?= base_url().'admin/Dashboard'?>">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="<?= base_url().'admin/blog/add_blog'?>">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                Add blog
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="<?= base_url().'admin/blog'?> ">
                <svg class="bi"><use xlink:href="#cart"/></svg>
                View blog
              </a>
            </li>           
          </ul>

          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                Settings
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="<?= base_url().'admin/login/logout'?>">
                <svg class="bi"><use xlink:href="#door- closed"/></svg>
                Sign out
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>
        Add New Blog Post
    </h2><br>
    </div>
    <form enctype= "multipart/form-data" action="<?= base_url().'admin/blog/addblog_post'?>" method="post" style="width: 100%;">
        <div class="form_group">
            <!-- <label for="title">Title:</label> -->
            <input type="text" class="form_control" id="title" name="title" placeholder="Title" >
        </div>
        <div class="form_group">
            <!-- <label for="title">Blog Desc:</label> -->
            <textarea name="desc" class="form_control" id="desc" placeholder="Blog Desc"></textarea>
        </div><br>
        <div class="form_group">
            <label for="title">Image:</label>
            <input type="file" class="form_control" id="file" name="file" placeholder="Image" >
        </div><br>
        <button type="submit" class="btn btn-primary">Add Blog</button>

    </form>
</main>

<script type="text/javascript">
  <?php
  if(isset($_SESSION)){
    if($_SESSION['inserted'] == 'yes'){
      echo 'alert("Blog added successfully!")';
    
    }
    else{
      echo 'alert("Failed to add the blog!")';
      echo 'alert("'.$error.'")';
    }
  }

   ?>

</script>
<!doctype html>
<html lang="ar" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel = "stylesheet" type="text/css" href="https://getbootstrap.com/docs/5.3/examples/dashboard/dashboard.css">

    <title>Edit blog</title>


</head>

<?php $this->load->view('adminPanel/header'); ?>


<div class="container-fluid">
  <div class="row">
       <!-- Add Bootstrap CSS -->
       <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style>
  /* Sidebar container styling */
  .sidebar {
    height: 100vh;
    background-color: #343a40;
    color: white;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    /* Set fixed width for the sidebar */
    z-index: 1000;
    /* Ensures sidebar stays on top */
  }

  .main-content {
    margin-left: 250px;
    /* Same width as the sidebar */
    padding: 20px;
    width: calc(100% - 250px);
    /* Adjust the width to fit beside the sidebar */
  }

  .offcanvas-header {
    background-color: #212529;
    color: #fff;
    padding: 15px;
    border-bottom: 1px solid #444;
  }

  .offcanvas-title {
    font-size: 1.5rem;
    font-weight: bold;
  }

  .offcanvas-body {
    padding: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: calc(100% - 60px);
  }

  /* Nav items styling */
  .nav-link {
    color: #adb5bd;
    padding: 15px 20px;
    font-size: 1rem;
    font-weight: 500;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .nav-link:hover {
    background-color: #495057;
    color: #fff;
  }

  .nav-link.active {
    background-color: #495057;
    color: #fff;
    font-weight: bold;
  }

  .bi {
    width: 1.2rem;
    height: 1.2rem;
    color: #adb5bd;
  }

  .nav-link .bi {
    margin-right: 10px;
  }

  hr {
    border-color: #444;
  }

  .nav-link.signout {
    color: #dc3545;
  }

  .nav-link.signout:hover {
    background-color: #dc3545;
    color: white;
  }

  /* Lower the buttons by adding margin-top */
  .nav {
    margin-top: 30px;
    /* Adjust this value to control how much you lower the buttons */
  }

  /* Responsive styling for small screens */
  @media (max-width: 768px) {
    .sidebar {
      position: static;
      width: 100%;
      height: auto;
    }

    .main-content {
      margin-left: 0;
      width: 100%;
    }
  }

  /* Style for title and description input fields */
  .form_control {
    width: 100%;
    /* Make the input fields take the full width */
    max-width: 800px;
    /* Optional: You can set a maximum width if needed */
    padding: 10px;
    /* Add padding for better appearance */
    margin-bottom: 15px;
    /* Add some space between form fields */
    border: 1px solid #ced4da;
    /* Border styling */
    border-radius: 4px;
    /* Rounded corners */
    font-size: 1rem;
    /* Adjust font size */
  }

  /* Adjust the width of the textarea (description) to match */
  textarea.form_control {
    height: 150px;
    /* Set a fixed height for the textarea */
    resize: vertical;
    /* Allow vertical resizing */
  }
</style>

    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <!-- <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="<?= base_url().'admin/Dashboard'?>">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Dashboard
              </a>
            </li> -->

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="<?= base_url().'admin/blog'?> ">
                <svg class="bi"><use xlink:href="#cart"/></svg>
                View blog
              </a>
            </li>   
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="<?= base_url().'admin/blog/add_blog'?>">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                Add blog
              </a>
            </li>        
          </ul>

          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
            <!-- <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                Settings
              </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 signout" href="<?= base_url().'admin/login/logout'?>">
                <svg class="bi"><use xlink:href="#door- closed"/></svg>
                Sign out
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

<main class="main-content col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>
        Edit Blog Post
    </h2><br>
    </div>
    <?php 
    // echo "<pre>";
    // print_r($blog); 
    // echo "</pre>";
    ?>
    <form enctype= "multipart/form-data" action="<?= base_url().'admin/blog/editblog_post'?>" method="post" style="width: 100%;">
        <input type="hidden"  name="blogid" id = "blogid" value = "<?= $blog[0]['blogid']?>">
        <div class="form_group">
            <!-- <label for="title">Title:</label> -->
            <input type="text"  class="form_control" id="title" value="<?= $blog[0]['blog_title']?>" name="title" placeholder="Title" >
        </div>
        <div class="form_group">
            <!-- <label for="title">Blog Desc:</label> -->
            <textarea name="desc" class="form_control" id="desc"  placeholder="Blog Desc"><?= $blog[0]['blog_desc']?></textarea>
        </div><br>
        <div class="form_group">
            <img src="<?= base_url().$blog[0]['blog_img'] ?>" width="100" ><br>
            <label for="title">Image:</label>
            <input type="file" class="form_control" id="file" name="file" placeholder="Image" >
        </div><br>
        <button type="submit" class="btn btn-primary">Done</button>

    </form>
</main>

<script type="text/javascript">
  <?php
  if(isset($_SESSION)){
    if($_SESSION['inserted'] == 'yes'){
      echo 'alert("Blog updated successfully!")';
    
    }
    else{
      echo 'alert("Failed to edit the blog!")';
      echo 'alert("'.$error.'")';
    }
  }

   ?>

</script>
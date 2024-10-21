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
              <a class="nav-link d-flex align-items-center gap-2" href="#">
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
        View blog
    </h2><br>
    </div>
    <?php 
    echo "<pre>";
    print_r($blog);
    echo "</pre>";
    ?>
    <?php 
    if($blog){
      ?>
      <table border="1" style="width: 100%; text-align: left;">
      <thead>
          <tr>
              <th style="width: 10%;">Sr no</th>
              <th style="width: 20%;">Title</th>
              <th style="width: 35%;">Description</th>
              <th style="width: 15%;">Image</th>
              <th style="width: 10%;">Edit</th>
              <th style="width: 10%;">Delete</th>
          </tr>
      </thead>
      <tbody>
      <?php
          // Example of how to loop through the blog data and display it in a table
          // Replace the loop with your actual blog data fetching and displaying code
          // For example:
      for ($i = 0; $i < count($blog); $i++) {
        ?>
        <tr>
        <td><?= $blog[$i]['blogid'] ?></td>
        <td><?= $blog[$i]['blog_title'] ?></td>
        <td><?= $blog[$i]['blog_desc'] ?></td>
        <td><img src="<?=base_url().$blog[$i]['blog_img']?>" width="100" height="100"></td> 
        <td><a class="btn btn-info" href="<?= base_url().'admin/blog/edit_blog/1'?>">Edit</a></td>
        <td><a class="btn btn-danger" href="<?= base_url().'admin/blog/delete_blog/1'?>">Delete</a></td>
        </tr>
  
        <?php  
        }
        ?>
        
      </tbody>
  </table>
  <?php  }
    else{
      echo "No records found";
    }
    ?>
 

    </main>

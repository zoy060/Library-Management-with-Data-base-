<?php
require_once "../includes/connect.php";
require_once 'admin.control.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

</head>

<body>
  <h1 class="text-center p-3">Admin Panel</h1>

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <!-- logo -->
      <a class="navbar-brand" href="../">Library</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Members</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link " href="borrowlist.php" >Borrow List</a>
          </li>
        </ul>

        
      </div>
    </div>
  </nav>



  <div class="container p-2">
    <div class="row row-cols-1 row-cols-md-5 g-4 ">
      <form class="m-0 p-0 mt-3"> <button class="h-100 btn">
          <div class="card h-100 p-0 m-0">
            <img src="../cover/add.png" class="card-img-top p-3 img" alt="">
            
            <div class="card-body">
              <h5 class="card-title">Add a new Book</h5>
              <p class="card-text"></p>
            </div>
            <!-- <div class="card-footer">
              <small class="text-muted">Price : ' . $bookList[$i]['Price'] . ' tk</small>
            </div> -->
          </div>
        </button> </form>
      <?php

      bookList($con);


      ?>

    </div>
  </div>


  <script src="../bootstrap/js/bootstrap.js"></script>

</body>

</html>
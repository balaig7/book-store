<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Book Shop | <?=$title?></title>
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.css">
            <link rel="stylesheet" href="assets/css/sweetalert2.css">
            <link rel="stylesheet" href="assets/css/custom.css">

         
   </head>
   <body>
      <header id="header" class="fixed-top p-2 bg-white">
         <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><a href="index.php">Book Shop</a></h1>
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item ">
                        <a class="nav-link active" href="index.php">Home <span class="sr-only"></span></a>
                     </li>
                     
                     <li class="nav-item">
                        <a class="nav-link" href="books.php">Books</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="request-books.php">Request Book</a>
                     </li>
                     <?php   if (empty($_SESSION['login'] ) ){   ?>  

                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="admin/login.php">Admin</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="login.php">User</a>
                        </div>
                     </li>
                     <?php }else{?>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $_SESSION['is_admin']=='0' ? viewData('users',$_SESSION['user_id'])['name']:"Admin" ;sessionExpire($_SESSION['login_time']) ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="<?=$_SESSION['is_admin']=='0' ? "logout.php" : "admin/logout.php"?>">Logout</a>
                        </div>
                     </li>
                  <?php } ?>

                  </ul>
               </div>
            </nav>
         </div>
      </header>
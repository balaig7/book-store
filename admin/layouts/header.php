<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Book Shop | <?=$title?></title>
      <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="../assets/css/font-awesome.css">
      <link rel="stylesheet" href="../assets/css/style.css">
      <link rel="stylesheet" href="../assets/css/dataTables.min.css">
      <link rel="stylesheet" href="../assets/css/sweetalert2.css">
   </head>
   <body>
      <nav class="navbar navbar-light bg-primary p-3">
         <div class="float-right">
            <a class="navbar-brand text-white" href="#">
            Books Store
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
         </div>
         <div class="float-right">
            <div class="dropdown">
               <a class="  dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
               Admin
               </a>
               <?=sessionExpire($_SESSION['login_time']);?>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
               </ul>
            </div>
         </div>
      </nav>
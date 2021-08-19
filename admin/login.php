<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Admin Login</title>
      <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
   </head>
   <body class="bg-light p-5">
      <div class="container p-5  ">
         <div class="row align-items-center ">
            <div class="col-4 mx-auto mt-4 ">
               <div class="card">
                  <div class="card-header">
                     <h4 class="text-center">Admin</h4>
                  </div>
                  <div class="card-body">
                     <form method="post" action="#" >
                        <div class="form-group">
                           <label >User Name</label>
                           <input type="text" class="form-control" name="user_name"  placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                           <label >Password</label>
                           <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary col-12">Login</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
<?php
include '../loader.php';
if(isset($_POST['login'])){
  $username=mysqli_real_escape_string($con,$_POST['user_name']);
  $password= mysqli_real_escape_string($con,$_POST['password']);
     $query = "SELECT * FROM `login`  WHERE user_name='$username' AND password=md5('$password')" ;
      $results = mysqli_query($con,$query);
      $row = mysqli_fetch_assoc($results); 
      $user = mysqli_num_rows($results);
      $exist=false;
      if ($user>0)
      {
      $exist=true;
      $_SESSION['login']=true; 
      $_SESSION['login_time']=time();
      $_SESSION['id']=$row['id'];
      $_SESSION['username']=$row['username'];
      $_SESSION['is_admin']=$row['is_admin'];
      }
      if($exist)
      {
            header('location:index.php'); 
            
      }
  else{
      echo '<div class="col-4 float-right">
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Please Check Your Username or Password! 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
      </div>';
     }
}

?>
      <script src="../assets/js/jquery.js" ></script>
      <script src="../assets/js/popper.min.js" ></script>
      <script src="../assets/js/bootstrap.js"></script>
   </body>
</html>
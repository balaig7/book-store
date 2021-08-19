<?php 
include '../loader.php'; 
$title="Home";
include 'layouts/header.php'; 
include 'layouts/side-nav.php'; 
?>
<?php if ($_SESSION['login'])  { if (isset($_SESSION['is_admin'])=='1'){                
 
 function totalBooks(){
   global $con;
                $sql="SELECT COUNT(id) as total FROM `books`";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($result);
                if(isset($row['total'])){
                return $row['total'];
                }
 }

 function totalCategory(){
   global $con;
                $sql="SELECT COUNT(id) as total FROM `category`";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($result);
                if(isset($row['total'])){
                return $row['total'];
                }
 }
 function totalRequests(){
   global $con;
                $sql="SELECT COUNT(id) as total FROM `requests`";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($result);
                if(isset($row['total'])){
                return $row['total'];
                }
 }

 function totalUsers(){
   global $con;
                $sql="SELECT COUNT(id) as total FROM `category`";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($result);
                if(isset($row['total'])){
                return $row['total'];
                }
 }

 ?>  
    <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
            <!-- <h1 class="h2">Dashboard</h1> -->
            <div class="row">
               <div class="col-md-3">
                  <div class="card bg-warning text-white">
                     <div class="card-body">
                        <h4 class="font-weight-normal mb-3">Total Books
                        </h4>
                        <h2 class="mb-3"><?=totalBooks()?></h2>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="card bg-danger text-white">
                     <div class="card-body">
                        <h4 class="font-weight-normal mb-3">Total Category
                        </h4>
                        <h2 class="mb-3"><?=totalCategory()?></h2>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="card bg-success text-white">
                     <div class="card-body">
                        <h4 class="font-weight-normal mb-3">Total Users<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-3"><?=totalUsers()?></h2>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="card bg-primary text-white">
                     <div class="card-body">
                        <h4 class="font-weight-normal mb-3">Total Requests<i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-3"><?=totalRequests()?></h2>
                     </div>
                  </div>
               </div>
         </main>
        
    <?php } else{
      echo "<script>
        window.location.href='404.php';
      </script>";
    }
    sessionExpire($_SESSION['login_time']);
  }else{
    echo "<script>
        window.location.href='login.php'
      </script>";
  } ?>

  <?php 
include 'layouts/footer.php'; 
?>
   
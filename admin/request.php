<?php 
   include '../loader.php';
   $title="Requests";
   include 'layouts/header.php'; 
   include 'layouts/side-nav.php'; 
   ?>
<?php if ($_SESSION['login'])  { if (isset($_SESSION['is_admin'])=='1'){                
   ?>  
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
   <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
         <div class="row">
            <div class="col-6">
               <h3 class="mb-0">Users</h3>
            </div>
            
         </div>
      </div>
      <!-- Light table -->
      <div class="table-responsive p-3">
         <table class="table table-hover dataTable">
            <thead>
               <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Book Name</th>
                  <th>Reason</th>
                  <th>Requested At</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
              <?php 
              $sql='Select users.name,requests.reason,requests.book_name,requests.created_at from requests inner join users where requests.user_id=users.id';
              $result=mysqli_query($con,$sql);
              if(mysqli_num_rows($result)>0){
               $i=1;
               while($row=mysqli_fetch_assoc($result)){


              ?>

               <tr>
                  <th><?=$i++?></th>
                  <td><?=$row['name']?></td>
                  <td><?=$row['reason']?></td>
                  <td><?=$row['book_name']?></td>
                  <td><?=$row['created_at']?></td>
                  <td><a href="create-books.php" class="btn btn-primary">Upload</a></td>
                  
                  
               </tr>
             <?php }} ?>
            </tbody>
         </table>
      </div>
   </div>
</main>
<?php } else{
   echo "<script>
     window.location.href='404.php';
   </script>";
   }
   }else{
   echo "<script>
     window.location.href='login.php'
   </script>";
   } ?>
<?php 
   include 'layouts/footer.php'; 
   ?>
<script type="text/javascript">
   $('.dataTable').dataTable({
          
      });
</script>
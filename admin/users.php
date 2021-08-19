<?php 
   include '../loader.php'; 
   $title="Users";
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
      <div class="table-responsive p-3">
         <table class="table table-hover dataTable">
            <thead>
               <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Register At</th>
               </tr>
            </thead>
            <tbody>
              <?php if (is_array(viewAllData('users'))){
              foreach (viewAllData('users') as $key => $value) {
              ?>

               <tr>
                  <th><?=$key+1?></th>
                  <td><?=$value['name']?></td>
                  <td><?=$value['phone']?></td>
                  <td><?=$value['email']?></td>
                  <td><?=ucfirst($value['gender'])?></td>
                  <td><?=$value['created_at']?></td>
                  
                  
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
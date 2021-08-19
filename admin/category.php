<?php 
   include '../loader.php'; 
   $title="Category";
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
               <h3 class="mb-0">Category</h3>
            </div>
            <div class="col-6 text-right">
               <a href="create-category.php" class="btn btn-primary" title="Create Category">Create Category</a>
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
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
              <?php if (is_array(viewAllData('category'))){
              foreach (viewAllData('category') as $key => $value) {
              ?>

               <tr>
                  <th><?=$key+1 ?></th>
                  <td><?=$value['name']?></td>
                  <td>               
                    <a href="create-category.php?id=<?=base64_encode($value['id'])?>" class="btn btn-primary" title="Edit Category">Edit </a>
                    <button type="button" class="btn btn-danger delete-category" data-id="<?=base64_encode($value['id'])?>" data-action="<?=base64_encode('delete-category')?>" title="Delete Category">Delete</a>
                  </td>
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
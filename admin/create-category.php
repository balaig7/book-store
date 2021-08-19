<?php 
include '../loader.php'; 
include 'layouts/header.php'; 
include 'layouts/side-nav.php'; 
?>
<?php if ($_SESSION['login'])  { if (isset($_SESSION['is_admin'])=='1'){  
   $categoryData['name']='';
   if(isset($_GET['id'])){
   $categoryData=viewData('category',base64_decode($_GET['id']));
   }              
 ?>  
    <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
      <div class="container">
         <div class="row align-items-center ">
            <div class="col-12 mx-auto mt-4 ">
               <div class="card">
                  <div class="card-header">
                     <h4 class="">
                        <?=empty($_GET['id']) ? "Create Category" : "Update Category"?>
                     </h4>
                  </div>
                  <div class="card-body">
                     <form method="post"  class="category-form  needs-validation" novalidate>
                        <div class="form-group">
                           <label >Name</label>
                           <input type="text" required class="form-control " name="name" 
                           value="<?=$categoryData['name']?>"  placeholder="Enter Category">
                           <div class="errorClass"></div>
                           <input type="hidden" class="form-control" name="action" 
                           value="<?=empty($_GET['id']) ? base64_encode('create-category') :base64_encode('update-category')?>"  placeholder="Enter Category">
                           <input type="hidden" name="id" value="<?=@$_GET['id']?>">
                        </div>
                        <?php if(empty($_GET['id'])){
                           echo '<button type="button" class="btn btn-primary save-category">Create
                        </button>';
                        }
                        else{
                            echo '<button type="button" class="btn btn-primary update-category">Update
                        </button>';
                        }
                        ?>
                     </form>
                  </div>
               </div>
            </div>
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
   
</script>
  
<?php 
   include '../loader.php'; 
   include 'layouts/header.php'; 
   include 'layouts/side-nav.php'; 
   ?>
   
<?php if ($_SESSION['login'])  { if (isset($_SESSION['is_admin'])=='1'){  
   $books['name']=$books['author']=$books['status']=$books['published_at']='';
   if(isset($_GET['id'])){
         $books=viewData('books',base64_decode($_GET['id']));

   }              
   ?>  
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
   <div class="container">
      <div class="row align-items-center ">
         <div class="col-12 mx-auto mt-4 ">
            <div class="card">
               <div class="card-header">
                  <h4 class="">
                     <?=empty($_GET['id']) ? "Upload Book" : "Edit Book"?>
                  </h4>
               </div>
               <div class="card-body">
                  <form method="post" class="books-details" enctype="multipart/form-data">
                     <div class="form-group">
                        <label >Name</label>
                        <input type="text" required  class="form-control" name="name" 
                           value="<?=$books['name']?>"  placeholder="Enter Name">
                        <input type="hidden" class="form-control" name="action" 
                           value="<?=empty($_GET['id']) ? base64_encode('create-books') :base64_encode('update-book')?>"  placeholder="Enter Category">
                        <input type="hidden" name="id" value="<?=@$_GET['id']?>">
                     </div>
                     <div class="form-group">
                        <label >Category</label>
                        <select class="form-control" name="category">
                           <?php foreach (viewAllData('category') as $key => $value) { ?>
                           <option value="<?=$value['id']?>" ><?=$value['name']?></option>
                           <?php } ?>
                        </select>
                     </div>
                     <div class="form-group">
                        <label >Image</label>
                        <input type="file" required  class="form-control" name="thumnail_image" accept="image/*"
                           value="" >
                        <input type="hidden" name="old_image" value="<?=$books['book_thumnail_image']?>">
                     </div>
                     <div class="form-group">
                        <label >Content</label>
                        <input type="file" required  class="form-control" name="content" 
                           value="" accept="application/pdf">
                        <input type="hidden" name="old_content" value="<?=$books['contents']?>">

                     </div>
                     <div class="form-group">
                        <label >Author</label>
                        <input type="text" class="form-control" name="author" 
                           value="<?=$books['author']?>"  placeholder="Enter Author Name">
                     </div>
                     <div class="form-group">
                        <label >Published At</label>
                        <input type="text" required  class="form-control" name="published_at" 
                           value="<?=$books['published_at']?>"  placeholder="Enter Year">
                     </div>
                     <p>Active</p>
                     <label class="switch mt-2 mb-4">
                              <input type="checkbox" class="status" <?=$books['status']=='1'? 'checked' : '' ?> value="<?=$books['status']?>" name="status">
                              <span class="slider round"></span>
                     </label>
                     
                     <?php if(empty($_GET['id'])){
                        echo '<div><button type="button" class="btn btn-primary upload-book">Upload
                        </button></div>';
                        }
                        else{
                         echo '<div><button type="button" class="btn btn-primary update-book">Update
                        </button></div>';
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
   $(".status").change(function(){
      if($(this).prop("checked") == true){
        $(this).val('1');
      }
      else{
        $(this).val('0');
      } 
    });
   // $(document).on('click','.upload-book',function(){
   // var formdata=new FormData($('.books-details')[0])
   //       $.ajax({
   //    type:"post",
   //    url:"ajax.php",
   //    data:formdata,
   //    contentType:false,
   //    processData:false,
   //    success:function(data){
   //       var response=$.parseJSON(data);
   //           if(response.status==1){
   //               Swal.fire(
   //                'New Books Inserted',
   //                '',
   //                'success'
   //              ).then(function (result) {
   //                          if (result.value) {
   //                            window.location = "books.php";
   //                          }
   //                        });
   //           }
   //           else{
   //              Swal.fire('Error in deleting books!', '', 'error')
   //           }

   //        }
   //    })
   // })

   
</script>
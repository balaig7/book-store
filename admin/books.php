<?php 
   include '../loader.php'; 
        $title="Books";

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
               <h3 class="mb-0">All Books</h3>
            </div>
            <div class="col-6 text-right">
               <a href="create-books.php" class="btn btn-primary" title="Create Book">Upload New Book</a>
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
                  <th>Category</th>
                  <th>Image</th>
                  <th>Book</th>
                  <th>Author</th>
                  <th>Published At</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
              <?php if (is_array(books())){
              foreach (books() as $key => $value) {
              ?>

               <tr>
                  <th><?=$key+1?></th>
                  <td><?=$value['book_name']?></td>
                  <td><?=$value['cat_name']?></td>
                  <td>
                  <?='<img src="../assets/uploads/book_images/'.$value["book_thumnail_image"].'" class="book-image">'
                  ?>
                     
                  </td>
                  <td>

               <?='<a class="btn btn-success" href="../assets/uploads/book_contents/'.$value["contents"].'" target=_blank>View</a>'?>
                                      

                  </td>
                  <td><?=$value['author']?></td>
                  <td><?=$value['published_at']?></td>
                  <td><span class="badge badge-pill <?=$value['status']=='1' ? 'badge-success' : 'badge-danger' ?>"><?=$value['status']=='1' ? 'Active' : 'Not Active' ?></span></td>
                  <td>               
                    <a href="create-books.php?id=<?=base64_encode($value['book_id'])?>" class="btn btn-primary" title="Edit Books">Edit </a>
                    <button type="button" class="btn btn-danger delete-book" data-id="<?=base64_encode($value['book_id'])?>" data-action="<?=base64_encode('delete-book')?>" title="Delete Book">Delete</a>
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
<?php 
   include "loader.php";
      $title="Request Book";

   include "layouts/header.php";
   ?>
<section class="contents">
   <img src="assets/img/banner-2.jpg" class="w-100 banner-image">
</section>
<?php   if (!empty($_SESSION['login'])  && $_SESSION['is_admin']=='0'){     
?>           

<div class="container p-5  ">
         <div class="row align-items-center ">
            <div class="col-6 mx-auto mt-4 ">
               <div class="card">
                  <div class="card-header ">
                     <h4 class="text-center">Request Book</h4>
                  </div>
                  <div class="card-body  ">
                     <form method="post" class="request-form" >
                        
                        <div class="form-group">
                           <label >Book Name</label>
                           <input type="text"  required class="form-control" name="name" placeholder="Enter Book Name">
                        </div>
                        <div class="form-group">
                           <label >Reason</label>
                           <textarea class="form-control" name="reason" ></textarea>
                           <input type="hidden" class="form-control" name="action" value="<?=base64_encode('request-book')?>">
                           <input type="hidden" name="id" value="<?=$_SESSION['id']?>">
                        </div>
                        
                              <button type="button" class="btn btn-primary col-12 mt-4 request-book">Request</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

<?php }else{ ?>
   <div class="text-muted mx-auto text-center p-4"><h4>Please <a href="login.php">Login</a> To Continue </h4></div>


<?php } ?>
<?php
   include "layouts/footer.php";
?>




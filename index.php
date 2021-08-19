<?php 
include "loader.php";
   $title="Home";

include "layouts/header.php";
?>

      <section class="banner">
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="d-block w-100" src="assets/img/banner-1.jpg" alt="First slide">
               </div>
               <div class="carousel-item">
                  <img class="d-block w-100" src="assets/img/banner-2.jpg" alt="Second slide">
               </div>
               <div class="carousel-item">
                  <img class="d-block w-100" src="assets/img/banner-3.jpg" alt="Third slide">
               </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </section>

      
      <section >
      	<div class="d-flex">
      		
      	<h4 class="pb-3 pl-3 pr-1">Books</h4><a href="books.php" class="pb-3 pr-3">(View All)</a>
      	</div>
         <div class="container mb-4">
      	<div class="col-12"> 
      		<div class="row ">
      			      <?php foreach (indexPage() as  $allCategories) { ?>

      			<div class="col-3 pb-3">
      			<img class="d-block w-100" style="height: 325px;" src="assets/uploads/book_images/<?=$allCategories['book_thumnail_image']?>" alt="php tutorials">
               <h4 class="mt-3 text-center"><?=$allCategories['book_name']?></h4><div class="mt-3 text-center"><button class="btn btn-primary view-details" type="button" data-id="<?=$allCategories['book_id']?>">View Details</a></div>
      			</div>
                    <?php  }?>
               
      			

      			

      		</div>



      	</div>

</div>

      </section>
<?php
include 'layouts/footer.php';
?>
      
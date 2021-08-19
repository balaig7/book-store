<?php 
   include "loader.php";
   $title="All Books";
   include "layouts/header.php";
   ?>
<section class="contents">
   <img src="assets/img/banner-2.jpg" class="w-100 banner-image">
</section>
<section class="pb-5">
   <div class="container">
      <h4 class="mb-3">Category</h4>
      <div class="col-12">
         <div class="row">
            <?php base64_encode('book-details');foreach (viewAllData('category') as  $category) { ?>
            <button type="button" class="btn btn-primary mr-2 category" data-action="<?=base64_encode('view-Data')?>" data-category="<?=$category['name']?>"><?=$category['name']?></button>
            <?php }?>
         </div>
         <div id="books" class="row pt-5"></div>
      </div>
   </div>
</section>
<?php
   include "layouts/footer.php";
   ?>
<script type="text/javascript">
   $(document).on('click','.category',function(){
              var category=$(this).data('category')
              var action=$(this).data('action')
              var bookDetails=''
              $.ajax({
          type:"post",
          url:"user-ajax.php",
          data:{category:category,action:action},
          success:function(data){
              var response=JSON.parse(data);
              if(response.data!="0"){
                  for (var i = 0; i < response.length; i++) {
               bookDetails+=`<div class="col-3 "><img class="w-100" style="height:300px" src="assets/uploads/book_images/`+response[i].book_thumnail_image+`" ><h4 class="mt-3 text-center">`+response[i].book_name+`</h4><div class="mt-3 text-center"><button class="btn btn-primary view-details" type="button" data-id="`+response[i].book_id+`">View Details</a></div></div>`
                     }
                  $('#books').html(bookDetails);
            	}else{
            		bookDetails=$('#books').html("<div class='mx-auto text-muted no-books'>No books in this category</div>");
              }
            }
          })
      })
              
      

</script>
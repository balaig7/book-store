$(document).ready(function(){
		$(document).on('click','.register',function(){
			$.ajax({
		type:"post",
		url:"user-ajax.php",
		data:$('.register-form').serialize(),
		success:function(data){
			var response=$.parseJSON(data);
             if(response.status==1){
                 Swal.fire(
                  'Registration Successfull!',
                  'Click here to login',
                  'success'
                ).then(function (result) {
                            if (result.value) {
                              window.location = "logout.php";
                            }
                          });
             }
             else{
                Swal.fire('Error in registration!', '', 'error')
             }

		    }
		})
	})
$(document).on('click','.view-details',function(){
    var id=$(this).data('id');
            $.ajax({
        type:"post",
        url:"user-ajax.php",
        data:{table:'books',id:id},
        success:function(data){
            var response=$.parseJSON(data);
             var datas=`
                     <div class="modal fade" id="view-book" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
               <div class="row">
                  <div class="col-6">
         <div class="modal-body">
                     <img class="w-100" src="assets/uploads/book_images/`+response['book_thumnail_image']+`" alt="">
                  </div>
                  </div>
                  <div class="col-6">
                  <div class="modal-body">

                     <div class="mt-2">
                        <b><h2 class="mt-2">`+response['name']+`</h2></b>
                     </div>
                              <div class=""><b>Author :</b>
                           `+response['author']+` 
                        </div><div class=""><b>Published At:</b>
                           `+response['published_at']+` 
                        </div>
                                    <a href="assets/uploads/book_contents/`+response['contents']+`" class="btn btn-primary mt-3" target=_blank >View</a>

                           
                  </div>
               </div>
            </div>
         </div>
               </form>
      </div>
   </div>`
                     $(datas).modal('show');

            }
        })
    })
$(document).on('click','.request-book',function(){
         $.ajax({
      type:"post",
      url:"user-ajax.php",
      data:$('.request-form').serialize(),
      success:function(data){
         var response=$.parseJSON(data);
             if(response.status==1){
                 Swal.fire(
                  'Request send',
                  'We will take further process in future.Thankyou!',
                  'success'
                ).then(function (result) {
                            if (result.value) {
                              $('.request-form')[0].reset();
                              window.location = "request-books.php";
                            }
                          });
             }
             

          }
      })
   })
})
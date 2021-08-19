<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Book Shop | Register</title>
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
                  <link rel="stylesheet" href="assets/css/sweetalert2.css">

   </head>
   <body class="bg-light p-5">
      <div class="container p-5  ">
         <div class="row align-items-center ">
            <div class="col-6 mx-auto mt-4 ">
               <div class="card">
                  <div class="card-header ">
                     <h4 class="text-center">Register</h4>
                  </div>
                  <div class="card-body  ">
                     <form method="post" class="register-form" >
                        <div class="form-group">
                           <label >Name</label>
                           <input type="text" required  class="form-control" name="name"  placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                           <label >Phone</label>
                           <input type="text" required  class="form-control" name="phone" placeholder="Phone">
                           <input type="hidden" class="form-control" name="action" value="<?=base64_encode('user-register')?>">
                        </div>
                        <div class="form-group">
                           <label >Email</label>
                           <input type="email" required  class="form-control" name="email" placeholder="Phone">
                        </div>
                        <div class="form-group">
                           <label >Password</label>
                           <input type="password" required  class="form-control" name="password"  placeholder="Enter Username">
                        </div>
                        <div class="mb-3">Gender</div>
                        
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio1" name="gender" class="custom-control-input" value="male">
                          <label class="custom-control-label" for="customRadio1">Male</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio2" name="gender" class="custom-control-input" value="female">
                          <label class="custom-control-label" for="customRadio2">Female</label>
                        </div>
                              <button type="button" class="btn btn-primary col-12 mt-4 register">Register</button>
                        <div class="p-3"> Already have an account login? <a href="login.php">here</a></div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   <script src="assets/js/jquery.js" ></script>
      <script src="assets/js/popper.min.js" ></script>
      <script src="assets/js/bootstrap.js"></script>
               <script src="assets/js/sweetalert2.js"></script>

            <script src="assets/js/user-ajax.js"></script>

   </body>
</html>
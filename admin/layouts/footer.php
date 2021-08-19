</div>
</div>
</body>
<!-- <script src="../assets/js/jquery.js" ></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../assets/js/popper.min.js" ></script>
<script src="../assets/js/bootstrap.js"></script>
<script src="../assets/js/bootstrap.js"></script>
<script src="../assets/js/dataTables.min.js"></script>
<script src="../assets/js/sweetalert2.js"></script>
<script src="../assets/js/ajax.js"></script>
</html>
<script type="text/javascript">
   $(document).ready(function() {
   $('ul > li a').each(function(){
   $(this).removeClass("active");
   if(window.location.toString().includes($(this).attr("href"))){
   $(this).addClass("active");
   }
   })
   });
</script>
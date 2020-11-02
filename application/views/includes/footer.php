</div>
   <footer>

   </footer>
   
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url();?>assets/js/jquery-3.5.1.slim.min.js" ></script>
    <script src="<?php echo base_url();?>assets/js/popper.min.js" ></script>
     <script src="<?php echo base_url();?>assets/js/font_awesome.js" ></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" ></script>
     <script src="<?php echo base_url();?>assets/js/jof_javascript.js" ></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
     <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
  </body>
</html>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
    function checkPassword(){
         var pass = $('#pass').val();
         var conf_pass = $('#conf_pass').val();
         
         if(pass != conf_pass){
            $("#password_message").css("display", "block");
         }else{
            $("#password_message").css("display", "none");
         }
    }

</script>
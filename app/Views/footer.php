 <!-- Footer -->

 <footer class="sticky-footer bg-white">

   <div class="container my-auto">

     <div class="copyright text-center my-auto">

       <span>Copyright &copy; LUCA BRASI 2021</span>

     </div>

   </div>

 </footer>

 <!-- End of Footer -->



 </div>

 <!-- End of Content Wrapper -->



 </div>

 <!-- End of Page Wrapper -->



 <!-- Scroll to Top Button-->

 <a class="scroll-to-top rounded" href="#page-top">

   <i class="fas fa-angle-up"></i>

 </a>



 <!-- Logout Modal-->

 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

   <div class="modal-dialog" role="document">

     <div class="modal-content">

       <div class="modal-header">

         <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>

         <button class="close" type="button" data-dismiss="modal" aria-label="Close">

           <span aria-hidden="true">×</span>

         </button>

       </div>

       <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>

       <div class="modal-footer">

         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

         <a class="btn btn-primary" href=<?php echo site_url() . "/dashboard/logout"  ?>>Logout</a>

       </div>

     </div>

   </div>

 </div>



 <!-- Logout Modal-->

 <div class="modal fade" id="forgetpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

   <div class="modal-dialog" role="document">

     <div class="modal-content">

       <div class="modal-header">

         <h5 class="modal-title" id="exampleModalLabel">Forgot Your Password ?</h5>

         <button class="close" type="button" data-dismiss="modal" aria-label="Close">

           <span aria-hidden="true">×</span>

         </button>

       </div>

       <div class="modal-body">

         <div class="form-group row">

           <div class="col-sm-8 mb-3 mb-sm-0">

             <input type="email" name="txtemail" id="txtemail" placeholder="Enter Your Email" class="form-control" />

           </div>

           <div class="col-sm-4 mb-3 mb-sm-0">

             <input type="button" name="sendmail" value="Send Code" id="idsendmail" class="form-control btn btn-primary" />

           </div>

         </div>

         <div class="form-group row" id="verification" hidden>

           <div class="col-sm-4 mb-3 mb-sm-0">

             <input type="text" name="verificationcode" id="verificationcode" placeholder="Code" class="form-control" />

           </div>

           <div class="col-sm-4 mb-3 mb-sm-0">

             <input type="button" name="verify" value="Verify" id="idverifyotp" class="form-control btn btn-primary" />

           </div>

         </div>

         <div class="form-group row" id="resetpass" hidden>

           <div class="col-sm-6 mb-3 mb-sm-0">

             <input type="password" name="txtresetpass" id="resetpassword" placeholder="Enter Password" class="form-control" />

           </div>

           <div class="col-sm-6 mb-3 mb-sm-0">

             <input type="password" name="txtresetpass" id="reresetpassword" placeholder="Re-Enter Password" class="form-control" />

           </div>

         </div>

       </div>



       <div class="modal-footer">

         <div class="form-group row">



           <div class="col-sm-4 mb-3 mb-sm-0">

             <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

           </div>

           <div class="col-sm-8 mb-3 mb-sm-0">

             <input type="button" name="sendmail" value="Update Password" id="btnupdatepassword" disabled class="form-control btn btn-primary" />

           </div>

         </div>





       </div>

     </div>

   </div>

 </div>





 <script>
   var carma = {

     config: 
     {
       
       adddriver: "<?php echo base_url("/index.php/dashboard/adddriver"); ?>",

       deletedriver: "<?php echo base_url("/index.php/dashboard/deletedriver"); ?>",

       deletecar: "<?php echo base_url("/index.php/dashboard/deletecar"); ?>",

       addattribute: "<?php echo base_url("/index.php/dashboard/addnewattribute"); ?>",

       sendmail: "<?php echo base_url("/index.php/dashboard/sendmail"); ?>",

       verify: "<?php echo base_url("/index.php/dashboard/verify"); ?>",

       updatepassword: "<?php echo base_url("/index.php/dashboard/updatepassword"); ?>",

       usernameexists: "<?php echo base_url("/index.php/dashboard/usernameexists"); ?>",

       carexists: "<?php echo base_url("/index.php/dashboard/carexists"); ?>",

       update_email: "<?php echo base_url("/index.php/dashboard/update_email"); ?>",

       deletecarmngr: "<?php echo base_url("/index.php/dashboard/deletecarmngr"); ?>",

       deleteday: "<?php echo base_url("/index.php/dashboard/delete_driving_day"); ?>",

       deletefuel: "<?php echo base_url("/index.php/dashboard/delete_fuel"); ?>",

     }
   }
 </script>

 <!-- Bootstrap core JavaScript-->

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <script src="<?php echo base_url(); ?>/public/assets/vendor/jquery/jquery.min.js"></script>

 <script src="<?php echo base_url(); ?>/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



 <!-- Core plugin JavaScript-->

 <script src="<?php echo base_url(); ?>/public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>



 <!-- Custom scripts for all pages-->

 <script src="<?php echo base_url(); ?>/public/assets/js/sb-admin-2.min.js"></script>

 <script src="<?php echo base_url(); ?>/public/assets/js/carma.js"></script>

 <!-- Page level plugins -->

 <script src="<?php echo base_url(); ?>/public/assets/vendor/datatables/jquery.dataTables.min.js"></script>

 <script src="<?php echo base_url(); ?>/public/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>



 <!-- Page level custom scripts -->

 <script src="<?php echo base_url(); ?>/public/assets/js/demo/datatables-demo.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>





 <?php

  if (isset($_SESSION['success_alert'])) {

    echo $_SESSION['success_alert'];

    unset($_SESSION['success_alert']);
  }

  if (isset($_SESSION['success_alert_update'])) {

    echo $_SESSION['success_alert_update'];

    unset($_SESSION['success_alert_update']);
  }



  if (isset($_SESSION['success_alert_car'])) {

    echo $_SESSION['success_alert_car'];

    unset($_SESSION['success_alert_car']);
  }



  if (isset($_SESSION['wrongpassword'])) {

    echo $_SESSION['wrongpassword'];

    unset($_SESSION['wrongpassword']);
  }

  if (isset($_SESSION['success_alert_update_car'])) {

    echo $_SESSION['success_alert_update_car'];

    unset($_SESSION['success_alert_update_car']);
  }
  if (isset($_SESSION['success_repeate_pass'])) {

    echo $_SESSION['success_repeate_pass'];

    unset($_SESSION['success_repeate_pass']);
  }

  if (isset($_SESSION['txttrackingnumber'])) {

    echo $_SESSION['txttrackingnumber'];

    unset($_SESSION['txttrackingnumber']);
  }
  if (isset($_SESSION['txtmodel'])) {

    echo $_SESSION['txtmodel'];

    unset($_SESSION['txtmodel']);
  }
  if (isset($_SESSION['txtcolor'])) {

    echo $_SESSION['txtcolor'];

    unset($_SESSION['txtcolor']);
  }
  if (isset($_SESSION['txtrentalcompany'])) {

    echo $_SESSION['txtrentalcompany'];

    unset($_SESSION['txtrentalcompany']);
  }
  if (isset($_SESSION['txtcountrycode'])) {

    echo $_SESSION['txtcountrycode'];

    unset($_SESSION['txtcountrycode']);
  }
  if (isset($_SESSION['txtmileage'])) {

    echo $_SESSION['txtmileage'];

    unset($_SESSION['txtmileage']);
  }
  if (isset($_SESSION['txtmodelyear'])) {

    echo $_SESSION['txtmodelyear'];

    unset($_SESSION['txtmodelyear']);
  }

  if (isset($_SESSION['txtmake'])) {

    echo $_SESSION['txtmake'];

    unset($_SESSION['txtmake']);
  }
  ?>



 </body>

 </html>
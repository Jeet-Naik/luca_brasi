 <!-- Begin Page Content -->



 <div class="container-fluid">



   <!-- Page Heading -->



   <!-- Content Row -->



   <div class="row">



     <!-- Area Chart -->

     <div class="col-xl-12 col-lg-7">

       <div class="card shadow mb-4">

         <!-- Card Header - Dropdown -->

         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

           <h6 class="m-0 font-weight-bold text-primary">Driver Detail</h6>



         </div>

         <!-- Card Body -->

         <div class="card-body">

           <form class="driver" method="post" action=<?php echo site_url() . "/dashboard/adddriver"; ?>>

             <div class="form-group row">

               <div class="col-sm-6 mb-3 mb-sm-0">

                 <input type="text" class="form-control form-control-user" id="firstname" name="txtfirstname" placeholder="First Name" title="Only  charectars are allowed" required>

               </div>

               <div class="col-sm-6">

                 <input type="text" class="form-control form-control-user" id="lastname" name="txtlastname" placeholder="Last Name" title="Only  charectars are allowed" required>

               </div>

             </div>

             <div class="form-group row">

               <div class="col-sm-4 mb-3 mb-sm-0">

                 <input type="email" class="form-control form-control-user" id="username" name="txtemail" placeholder="Email Id" required>

               </div>

               <div class="col-sm-4 mb-3 mb-sm-0">

                 <input type="text" class="form-control form-control-user" id="licenseno" name="txtlicenseno" placeholder="Driver License No." required>

               </div>
               <div class="col-sm-4 mb-3 mb-sm-0">

                 <input type="date" class="form-control form-control-user" id="dob" name="txtdob" placeholder="Enter Drivers Birth Date." title="Enter Date of Birth" required>

               </div>

             </div>





             <div class="form-group row">

               <div class="col-sm-6 mb-3 mb-sm-0">

                 <input type="password" class="form-control form-control-user" id="password" name="txtpassword" placeholder="Password" pattern=".{8,}" title="Minimum 8 letters are required" required>

               </div>

               <div class="col-sm-6">

                 <input type="password" class="form-control form-control-user" id="repeatpassword" name="txtrepeatpassword" placeholder="Confirm Password" required>

               </div>

             </div>
             <div class="form-group row">

               <div class="col-sm-4 mb-3 mb-sm-0 ">

                 <div class="form-check">
                   <input class="form-check-input" type="checkbox" value="" id="checkexpiry" name="checkexpiry">
                   <label class="form-check-label" for="checkexpiry">
                     Add License Expiry Date
                   </label>
                 </div>
               </div>

               <div class="col-sm-4 mb-3 mb-sm-0" id="expirydate" hidden>

                 <input type="date" class="form-control form-control-user" id="dtexpdate" name="dtexpdate" placeholder="Enter Expiry Date.">
               </div>
             </div>
         </div>

         <input type="submit" class="btn btn-primary btn-user btn-block" value="Add Driver" name="btnadddriver" />

         </form>

       </div>

     </div>

   </div>

 </div>




 </div>



 </div>

 <!-- /.container-fluid -->



 </div>

 <!-- End of Main Content -->
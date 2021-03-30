 <!-- Begin Page Content -->



 <div class="container-fluid">





   <!-- Content Row -->



   <div class="row">



     <!-- Area Chart -->

     <div class="col-xl-12 col-lg-7">

       <div class="card shadow mb-4">

         <!-- Card Header - Dropdown -->

         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

           <h6 class="m-0 font-weight-bold text-primary">Car Details</h6>



         </div>

         <!-- Card Body -->

         <div class="card-body">

           <form class="driver" method="post" action=<?php echo base_url() . "/dashboard/addcar"; ?>>

             <div class="form-group row">

               <div class="col-sm-4 mb-3 mb-sm-0">

                 <input type="text" class="form-control form-control-user" id="txtmake" name="txtmake" placeholder="Make" required>

               </div>

               <div class="col-sm-4 mb-3 mb-sm-0">

                 <input type="text" class="form-control form-control-user" placeholder="Model" name="txtmodel" id="txtmodel" required />

               </div>

               <div class="col-sm-4">



                 <input type="text" class="form-control  modelyear" placeholder="Year" name="txtmodelyear" id="datepicker" required />

               </div>

             </div>

             <div class="form-group row">

               <div class="col-sm-4 mb-3 mb-sm-0">

                 <input type="text" class="form-control form-control-user" id="color" name="txtcolor" placeholder="Enter Color" title="Select Car Color" required>

               </div>

               <div class="col-sm-4 mb-3 mb-sm-0">

                 <input type="text" class="form-control form-control-user" id="txtnumberplate" name="txtnumberplate" placeholder="Enter Number Plate No" title="Enter Number Plate no." required />

               </div>

               <div class="col-sm-4">

                 <input type="text" class="form-control form-control-user" id="txtrentalcompany" name="txtrentalcompany" placeholder="Car Rental Company." required>

               </div>

             </div>



             <div class="form-group row">



               <div class="col-sm-4 mb-3 mb-sm-0">

                 <input type="text" class="form-control form-control-user" id="txtmileage" name="txtmileage" placeholder="Enter Car Mileage" title="Enter Car Mileage." required />

               </div>

               <div class="col-sm-4 mb-3 mb-sm-0">

                 <input type="text" class="form-control form-control-user" id="txtcountrycode" name="txtcountrycode" placeholder="Enter Country Code" title="Enter Country Code." required />

               </div>


             </div>
             <div class="form-group row">

               <div class="col-sm-4 mb-3 mb-sm-0">

                 <input type="text" class="form-control form-control-user" id="txttrackingnumber" name="txttrackingnumber" placeholder="Enter GPS Tracking Number" title=" Enter GPS Tracking Number." required />

               </div>
             </div>

             <input type="submit" class="btn btn-primary btn-user btn-block" id="btnaddcar" value="Add Car" name="btnaddcar" />

           </form>

         </div>

       </div>

     </div>





   </div>



 </div>

 <!-- /.container-fluid -->



 </div>

 <!-- End of Main Content -->
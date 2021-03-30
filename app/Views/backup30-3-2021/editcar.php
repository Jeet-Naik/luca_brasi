<?php

if (isset($car_details)) {


?>



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

            <h6 class="m-0 font-weight-bold text-primary">Car Details</h6>



          </div>

          <!-- Card Body -->

          <div class="card-body">

            <form class="driver" method="post" action=<?php echo site_url() . "/dashboard/updatecar"; ?>>

              <input type="hidden" name="hiddencarid" value=<?php echo $car_details[0]['car_id']; ?>>

              <div class="form-group row">

                <div class="col-sm-4 mb-3 mb-sm-0">

                  <input type="text" class="form-control form-control-user" id="txtmake" name="txtmake" placeholder="Make" value="<?php echo $car_details[0]['make']; ?>" title="Enter Make Name" required>

                </div>

                <div class="col-sm-4 mb-3 mb-sm-0">

                  <input type="text" class="form-control form-control-user" placeholder="Model" name="txtmodel" id="txtmodel" value="<?php echo $car_details[0]['model']; ?>" title="Enter Model" required />

                </div>

                <div class="col-sm-4">



                  <input type="text" class="form-control  modelyear" placeholder="Year" name="txtmodelyear" id="datepicker" value=<?php echo $car_details[0]['year']; ?> title="Enter Manufacture Year" required />

                </div>

              </div>

              <div class="form-group row">

                <div class="col-sm-4 mb-3 mb-sm-0">

                  <input type="text" class="form-control form-control-user" id="color" name="txtcolor" placeholder="Enter Color" title="Select Car Color" value="<?php echo $car_details[0]['color']; ?>" title="Enter Color" required>

                </div>

                <div class="col-sm-4 mb-3 mb-sm-0">

                  <input type="text" class="form-control form-control-user" id="txtnumberplate" name="txtnumberplate" placeholder="Enter Number Plate No" title="Enter Number Plate no." value="<?php echo $car_details[0]['car_noplate']; ?>" title="Enter Car Number Plate" required />

                </div>

                <div class="col-sm-4">

                  <input type="text" class="form-control form-control-user" id="txtrentalcompany" name="txtrentalcompany" placeholder="Car Rental Company." value="<?php echo $car_details[0]['rentalcompany']; ?>" title="Enter Rental Company" required>

                </div>

              </div>



              <div class="form-group row">

                <div class="col-sm-4 mb-3 mb-sm-0">

                  <input type="date" class="form-control form-control-user" id="txtreturndate" name="txtreturndate" title="Select Return Date" value=<?php echo $car_details[0]['returndate']; ?> title="Enter Return Date" required>

                </div>

                <div class="col-sm-4 mb-3 mb-sm-0">

                  <input type="text" class="form-control form-control-user" id="txtmileage" name="txtmileage" placeholder="Enter Car Mileage" title="Enter Car Mileage." value=<?php echo $car_details[0]['car_mileage']; ?> title="Enter Car Mileage" required />

                </div>


                <div class="col-sm-4 mb-3 mb-sm-0">

                  <input type="text" class="form-control form-control-user" id="txtcountrycode" name="txtcountrycode" placeholder="Enter Country Code" title="Enter Country Code." value="<?php echo $car_details[0]['countrycode']; ?>" required />

                </div>

              </div>
              <div class="form-group row">

                <div class="col-sm-4 mb-3 mb-sm-0">

                  <input type="text" class="form-control form-control-user" id="txttrackingnumber" name="txttrackingnumber" placeholder="Enter GPS Tracking Number" title=" Enter GPS Tracking Number." value="<?php echo $car_details[0]['gpstrackingnumber']; ?>"  required />

                </div>
              </div>

              <input type="submit" class="btn btn-primary btn-user btn-block" id="btneditcar" value="Update Car Details" name="btneditcar" />

            </form>

          </div>

        </div>

      </div>





    </div>



  </div>

  <!-- /.container-fluid -->



  </div>

  <!-- End of Main Content -->





<?php

}

?>
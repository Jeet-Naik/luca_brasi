<?php
if ($driver_details !== "") {
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

            <h6 class="m-0 font-weight-bold text-primary">Driver Details of <?php echo $driver_details[0]['first_name'] . " " . $driver_details[0]['last_name'] ?></h6>

          </div>

          <!-- Card Body -->

          <div class="card-body">

            <form class="driver" method="post" action="<?php echo site_url() ?>/dashboard/editdetails">

              <div class="form-group row">

                <div class="col-sm-6 mb-3 mb-sm-0">

                  <input type="text" class="form-control form-control-user" id="firstname" name="txtfirstname" placeholder="First Name" value=<?php echo $driver_details[0]['first_name'] ?> title="Only  charectars are allowed" required>

                </div>

                <div class="col-sm-6">

                  <input type="text" class="form-control form-control-user" id="lastname" name="txtlastname" placeholder="Last Name" value=<?php echo $driver_details[0]['last_name'] ?> title="Only  charectars are allowed" required>

                </div>

              </div>

              <div class="form-group row">

                <div class="col-sm-4 mb-3 mb-sm-0">

                  <input type="email" class="form-control form-control-user" id="username" name="txtemail" placeholder="Email Id" value=<?php echo $driver_details[0]['username'] ?> required>

                </div>

                <div class="col-sm-4 mb-3 mb-sm-0">

                  <input type="text" class="form-control form-control-user" id="licenseno" name="txtlicenseno" placeholder="Driver License No." value="<?php echo $driver_details[0]['driver_license_no'] ?> " required>

                </div>
                <div class="col-sm-4 mb-3 mb-sm-0">

                  <input type="date" class="form-control form-control-user" id="dob" name="txtdob" placeholder="Enter Drivers Birth Date." title="Enter Date of Birth" value="<?php echo $driver_details[0]['dob'] ?>" required>

                </div>

              </div>
              <div class="form-group row">

                <div class="col-sm-4 mb-3 mb-sm-0 ">

                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="checkexpiry" <?php if ($driver_details[0]['license_expiry_date'] != "") {
                                                                                                echo "checked";
                                                                                              } ?> name="checkexpiry">
                    <label class="form-check-label" for="checkexpiry">
                      Add License Expiry Date
                    </label>
                  </div>
                </div>

                <div class="col-sm-4 mb-3 mb-sm-0" id="expirydate" <?php if ($driver_details[0]['license_expiry_date'] == "") {
                                                                      echo "hidden";
                                                                    } ?>>

                  <input type="date" class="form-control form-control-user" id="dtexpdate" name="dtexpdate" placeholder="Enter Expiry Date." value="<?php echo $driver_details[0]['license_expiry_date'] ?>" required>

                </div>
                <!-- <div class="col-sm-4 mb-3 mb-sm-0">

                 <input type="date" class="form-control form-control-user" id="dob" name="txtdob" placeholder="Enter Drivers Birth Date." title="Enter Date of Birth" required>

               </div> -->

              </div>

              <input type="hidden" name="edit_id" value=<?php echo $driver_details[0]['user_id']; ?>>

              <input type="hidden" name="hiddenpassword" value=<?php echo $driver_details[0]['password'] ?>>
              <!-- 
                <div class="form-group row">

                  <div class="col-sm-6 mb-3 mb-sm-0">

                    <input type="password" class="form-control form-control-user" id="password" name="txtpassword" placeholder="Password"  pattern=".{8,}" title="Minimum 8 letters are required" >

                  </div>

                  <div class="col-sm-6">

                    <input type="password" class="form-control form-control-user" id="repeatpassword"  name="txtrepeatpassword" placeholder="Repeat Password" >

                  </div>

                </div> -->

              <input type="submit" class="btn btn-primary btn-user btn-block" id="btneditdriver" value="Update Driver" name="btneditdriver" />

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
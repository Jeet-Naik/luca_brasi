<?php
if (isset($fuel_details)) {

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
                        <h6 class="m-0 font-weight-bold text-primary">Tanken Details of <?php echo $fuel_details[0]['driver_name'] . " on ".$fuel_details[0]['day_date']; ?> </h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?> 
                    <?= $validation->listErrors() ?>
                        <form class="driver" method="post" action=<?php echo site_url() . "/dashboard/updatefuel"; ?>>
                        
                            <input type="hidden" name="id" value=<?php echo $fuel_details[0]['fuel_id']; ?>>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="txtstartkm">Kilometer</label>
                                    <input type="number" class="form-control form-control-day" placeholder="Kilometer" name="txttkm" id="txttkm" value="<?php echo $fuel_details[0]['kilometer']; ?>" title=Kilometer" required />
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="txtstartkm">Zipcode</label>
                                    <input type="text" class="form-control form-control-day" placeholder="zipcode" name="zipcode" id="zipcode" value="<?php echo $fuel_details[0]['zipcode']; ?>" title="Zipcode" required />
                                </div>
                                <div class="col-sm-4">
                                    <label for="txtendtkm">Fuel Amount</label>
                                    <input type="number" class="form-control form-control-day" placeholder="Fuel Amount" name="fuelamt" id="fuelamt" value=<?php echo $fuel_details[0]['fuel_amount']; ?> title="Fuel Amount" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="txtstartfuel">Amount</label>
                                    <input type="number" class="form-control form-control-day" placeholder="Amount" name="amount" id="amount" value=<?php echo $fuel_details[0]['amount']; ?> title="Amount" required />
                                </div>
                                <div class="col-sm-4">
                                    <label for="accident_status">Oil Status</label><br/>
                                    <input type="checkbox" name="oil_status" id="oil_status" vlaue="1" <?php if($fuel_details[0]['oil_status'] == 1) { echo "checked";} ?>> Oil Filled
                                </div>
                                <div class="col-sm-4">
                                    <label for="accident_status">Blue Tanked Status</label><br/>
                                    <input type="checkbox" name="blue_tanked_status" id="blue_tanked_status" vlaue="1" <?php if($fuel_details[0]['blue_tanked_status'] == 1) { echo "checked";} ?>> Blue Tanked
                                </div>
                            </div>
                            
                            <input type="submit" class="btn btn-primary btn-user btn-block" id="btneditday" value="Update Tanken Details" name="btneditfuel" />
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
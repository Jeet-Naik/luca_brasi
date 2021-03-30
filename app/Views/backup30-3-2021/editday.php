<?php
if (isset($day_details)) {
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
                        <h6 class="m-0 font-weight-bold text-primary">Driving Day Details of <?php echo $day_details[0]['driver_name'] . " on ".$day_details[0]['day_date']; ?> </h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?> 
                    <?= $validation->listErrors() ?>
                        <form class="driver" method="post" action=<?php echo site_url() . "/dashboard/updateday"; ?>>
                        
                            <input type="hidden" name="id" value=<?php echo $day_details[0]['day_id']; ?>>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                <label for="txtstartkm">Station</label>
                                <?php
                                $dt=$db->table('destinations')->select('destination_id,name')->get()->getResultArray();
                                 ?>
                                    <select name="station" class="form-control form-control-day">
                                        <?php
                                         for($i=0;$i<count($dt);$i++)
                                         {
                                            ?> 
                                            <option value="<?php echo $dt[$i]['destination_id']?>"<?php if($dt[$i]['destination_id'] == $day_details[0]['destination_id']){ echo "selected";} ?>><?php echo $dt[$i]['name']; ?></option>
                                            <?php
                                         }
                                        ?>
                                    </select>

                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="txtstartkm">Start kilometer</label>
                                    <input type="number" class="form-control form-control-day" placeholder="Start Kilometer" name="txtstartkm" id="txtstartkm" value="<?php echo $day_details[0]['start_kilometer']; ?>" title="Start Kilometer" required />
                                </div>
                                <div class="col-sm-4">
                                    <label for="txtendtkm">End kilometer</label>
                                    <input type="number" class="form-control form-control-day" placeholder="End Kilometer" name="txtendtkm" id="txtendtkm" value=<?php echo $day_details[0]['end_kilometer']; ?> title="Start Kilometer" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="txtstartfuel">Start Fuel Level</label>
                                    <input type="number" class="form-control form-control-day" placeholder="Start Fuel Level" name="txtstartfuel" id="txtstartfuel" value=<?php echo $day_details[0]['start_fuel_level']; ?> title="Start Fuel Lever" required />
                                </div>
                                <div class="col-sm-4">
                                    <label for="txtendfuel">End Fuel Level</label>
                                    <input type="number" class="form-control form-control-day" placeholder="End Fuel Lever" name="txtendfuel" id="txtendfuel" value=<?php echo $day_details[0]['end_fuel_level']; ?> title="End Fuel Lever"  required/>
                                </div>
                                <div class="col-sm-4">
                                    <label for="accident_status">Accident Status</label><br/>
                                    <input type="checkbox" name="accident_status" id="accident_status" vlaue="1" <?php if($day_details[0]['accident_status'] == 1) { echo "checked";} ?>> Accident Happend
                                </div>
                            </div>
                            
                            <input type="submit" class="btn btn-primary btn-user btn-block" id="btneditday" value="Update Day Details" name="btneditday" />
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
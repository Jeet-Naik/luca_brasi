<?php   
if (isset($days)) {
//car list
$users=$db->table('tbl_user')->select('user_id,first_name,last_name')->get()->getResultArray();
foreach( $users as $keys=>$user)
{
    $users[$keys]['full_name']=$user['first_name']." ".$user['last_name'];
}

$car_list=$db->table('tbl_car')->select('car_id,car_noplate')->get()->getResultArray();

?>

<div class="container-fluid">
        <!-- Page Heading -->
        <!-- Content Row -->
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->

                     <!-- Card Body --> 
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Filter </h6>
                    </div>
                    <div class="card-body">
                    <?php  $today=date("Y-m-d"); 
                
                    ?>
                        <form  action=<?php echo site_url() . "/dashboard/view_days"; ?> method="get">
                            <div class="form-group row">
                            
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <?php if(isset(  $_GET['start_date'] )) { ?>
                                        <label for="start_date">Select Start Date</label>
                                        <input class="form-control" type="date" name="start_date" value="<?php echo $_GET['start_date'];?>" placeholder="Start Date" title="Start Date">
                                    <?php }
                                    else
                                    {
                                        echo ' <label for="start_date">Select Start Date</label>';
                                        echo '<input class="form-control" type="date" name="start_date" value="'.$today.'" placeholder="Start Date" title="Start Date">';
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <?php if(isset( $_GET['end_date'] )) { ?>
                                        <label for="end_date">Select End Date</label>
                                        <input class="form-control" type="date" name="end_date" value="<?php echo $_GET['end_date'];?>" placeholder="End Date" title="End Date">
                                    <?php } 
                                    else
                                    {
                                        echo '<label for="end_date">Select End Date</label>';
                                        echo '<input class="form-control" type="date" name="end_date" value="'.$today.'" placeholder="Start Date" title="Start Date">';
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-2 mb-2 mb-sm-0">
                                    <label for="sel_car">Select Car</label>
                                   <select name="sel_car" class="form-control">
                                    <option value="all">--All Cars--</option>
                                    <?php 
                                   
                                    foreach($car_list as $car)
                                    {
                                        if(isset($_GET['sel_car']))
                                        {
                                            ?> 
                                            <option value="<?php echo $car['car_id']; ?>" <?php if( $car['car_id'] == $_GET['sel_car']){echo 'selected';} ?>><?php echo $car['car_noplate']; ?></option>
                                            <?php
                                            }
                                        else
                                        {
                                            ?> 
                                            <option value="<?php echo $car['car_id']; ?>"><?php echo $car['car_noplate']; ?></option>
                                            <?php
                                        }
                                        // echo "<option value='".$car['car_id']."'>".$car['car_noplate']."</option>";
                                    }
                                    
                                    ?>
                                   </select>
                                </div>
                                <div class="col-sm-2 mb-3 mb-sm-0">
                                    <label for="sel_driver">Select User</label>
                                    <select name="sel_driver" class="form-control">
                                    <option value="all">--All Users--</option>
                                    <?php 
                                    
                                    foreach($users as $user)
                                    {
                                       
                                        if(isset($_GET['sel_driver']))
                                        {
                                            ?> 
                                            <option value="<?php echo $user['user_id']; ?>" <?php if($user['user_id'] == $_GET['sel_driver']){echo 'selected';} ?>><?php echo $user['full_name']; ?></option>
                                            <?php
                                            }
                                        else
                                        {
                                            ?> 
                                            <option value="<?php echo $user['user_id']; ?>"><?php echo $user['full_name']; ?></option>
                                            <?php
                                        }
                                        // echo "<option value='".$user['user_id']."' >".$user['full_name']."</option>";
                                    }
                                    
                                    ?>
                                    </select>
                                </div>
                       
                            </div>
                          
                            <div class="form-group row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <input type="submit" class="btn btn-primary btn-block" name="action" value="Filter">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Content Row -->
        <!-- Begin Page Content -->

        <!-- Page Heading -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Driving Day Details</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Driver Name</th>
                                <th>Station</th>
                                <th>Date</th>
                                <th>Start kilometer</th>
                                <th>End kilometer</th>
                                <th>car</th>
                                <th>Start Fuel Level</th>
                                <th>End Fuel Level</th>
                                <th>Accident Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Driver Name</th>
                                <th>Station</th>
                                <th>Date</th>
                                <th>Start kilometer</th>
                                <th>End kilometer</th>
                                <th>car</th>
                                <th>Start Fuel Level</th>
                                <th>End Fuel Level</th>
                                <th>Accident Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (isset($days)) {
                                foreach ($days as $row) {

                                    echo "<tr>";
                                    echo "<td>{$row['driver_name']}</td>";
                                    echo "<td>{$row['station']}</td>";
                                    echo "<td>{$row['day_date']}</td>";
                                    echo "<td>{$row['start_kilometer']}</td>";
                                    // echo "<td>{$row['end_kilometer']}</td>";
                                    if(isset($row['end_kilometer']) && !empty($row['end_kilometer']))
                                    {
                                        echo "<td>{$row['end_kilometer']}</td>";
                                    }
                                    else
                                    {
                                        echo "<td>-</td>";
                                    }
                                    echo "<td>{$row['car_noplate']}</td>";
                                    echo "<td>{$row['start_fuel_level']}</td>";
                                    if(isset($row['end_fuel_level']) && !empty($row['end_fuel_level']))
                                    {
                                        echo "<td>{$row['end_fuel_level']}</td>";
                                    }
                                    else
                                    {
                                        echo "<td>-</td>";
                                    }
                                    if($row['accident_status'] == 0)
                                    {
                                        echo "<td>Accident happend!</td>";
                                    }
                                    else if($row['accident_status'] == 1)
                                    {
                                        echo "<td>Accident did not happend!</td>";
                                    }
                                    // echo "<td>Fuel</td>";
                                    // if(count($fuel)!= 0){
                                    //     echo "<td><a href='". site_url() ."/dashboard/fueldetails/{$row['day_id']}' >view</td>";
                                    // }
                                    // else
                                    // {
                                    //     echo "<td>-</td>";
                                    // }
                                    echo "<td><a href=" . site_url() . "/dashboard/editday/{$row['day_id']} class='btn btn-success'  ><i class='fas fa-edit'></i></a></td>";
                                    echo "<td><a href='#' class='btn btn-danger deleteday' id={$row['day_id']} ><i class='fas fa-trash'></i></a></td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /.container-fluid -->

    <!-- End of Main Content -->
<?php
}
?>
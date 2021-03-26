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
                        <form  action=<?php echo site_url() . "/dashboard/view_tanken"; ?> method="get">
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
                <h6 class="m-0 font-weight-bold text-primary">Tanken Details</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Driver Name</th>
                                <th>Date</th>
                                <th>Kilometer</th>
                                <th>Zipcode</th>
                                <th>Fuel Amount</th>
                                <th>Amount</th>
                                <th>Oil Status</th>
                                <th>Blue Tanked Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Driver Name</th>
                                <th>Date</th>
                                <th>Kilometer</th>
                                <th>Zipcode</th>
                                <th>Fuel Amount</th>
                                <th>Amount</th>
                                <th>Oil Status</th>
                                <th>Blue Tanked Status</th>
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
                                    echo "<td>{$row['day_date']}</td>";
                                    echo "<td>{$row['kilometer']}</td>";
                                    echo "<td>{$row['zipcode']}</td>";
                                    echo "<td>{$row['fuel_amount']}</td>";
                                    echo "<td>{$row['amount']}</td>";
                                   
                                    if($row['oil_status'] == 1)
                                    {
                                        echo "<td>Oil filled</td>";
                                    }
                                    else if($row['oil_status'] == 0)
                                    {
                                        echo "<td>Did not fill oil</td>";
                                    }

                                    if($row['blue_tanked_status'] == 1)
                                    {
                                        echo "<td>Blue tanked </td>";
                                    }
                                    else if($row['blue_tanked_status'] == 0)
                                    {
                                        echo "<td>No tanked</td>";
                                    }

                                    echo "<td><a href=" . site_url() . "/dashboard/edit_fuel/{$row['fuel_id']} class='btn btn-success'  ><i class='fas fa-edit'></i></a></td>";
                                    echo "<td><a href='#' class='btn btn-danger deletefuel' id={$row['fuel_id']} ><i class='fas fa-trash'></i></a></td>";
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
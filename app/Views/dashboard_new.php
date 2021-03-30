 <?php 
        //  echo "<pre>";
        // print_r($stations);
        // echo "</pre>";
 ?>
 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Content Row -->
   <div class="row">
     <!-- Area Chart -->
     <div class="col-xl-12 col-lg-7">
       <div class="card shadow mb-4">
         <!-- Card Header - Dropdown -->
         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
           <h6 class="m-0 font-weight-bold text-primary">Add Station</h6>
         </div>
         <!-- Card Body -->
         <div class="card-body">
           <form class="driver" method="post" action=<?php echo base_url() . "/dashboard/addstation"; ?>>
             <div class="form-group row">
               <div class="col-sm-4 mb-3 mb-sm-0">
                 <input type="text" class="form-control form-control-station" id="txtstation" name="txtstation" placeholder="Station Name" title="Station Name" required>
               </div>
               <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="submit" class="btn btn-primary btn-user btn-block" id="btnaddstation" value="Add Station" name="btnaddstation" />
               </div>
             </div>
             </div>
           </form>
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
                <h6 class="m-0 font-weight-bold text-primary">Stations</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Station Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Station Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (isset($stations)) {
                                foreach ($stations as $row) {

                                    echo "<tr>";
                                    echo "<td>{$row['name']}</td>";
                                    echo "<td><a href=" . site_url() . "/dashboard/edit_station/{$row['destination_id']} class='btn btn-success'  ><i class='fas fa-edit'></i></a></td>";
                                    echo "<td><a href='#' class='btn btn-danger delete_station' id={$row['destination_id']} ><i class='fas fa-trash'></i></a></td>";
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
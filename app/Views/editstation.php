<?php 
// echo "test";
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
         <?php $validation = \Config\Services::validation(); ?> 
                    <?= $validation->listErrors() ?>
           <form class="driver" method="post" action=<?php echo base_url() . "/dashboard/update_station"; ?>>
           <input type="hidden" name="destination_id" id="destination_id" value="<?php echo $station['destination_id']; ?>">
             <div class="form-group row">
               <div class="col-sm-4 mb-3 mb-sm-0">
                 <input type="text" class="form-control form-control-station" id="txtstation" name="txtstation" placeholder="Station Name" title="Station Name"  value="<?php echo $station['name']; ?>" required>
               </div>
               <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="submit" class="btn btn-primary btn-user btn-block" id="btnupdatestation" value="Update Station" name="btnaddstation" />
               </div>
             </div>
             </div>
           </form>
         </div>
       </div>
     </div>
 </div>

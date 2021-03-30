<?php
require_once 'header.php';
if (isset($admin_details)) {

?>
  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href=<?php echo base_url() . "/dashboard";  ?>>
          <!-- <div class="sidebar-brand-text mx-3"></div> -->
          <img height="50px" width="75px" src=<?php echo base_url() . "/public/assets/img/logo.png"; ?> class="img-thumbnail">
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <div class="sidebar-heading">
          Station management
        </div>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url(); ?>/dashboard">
            <i class="fas fa-home"></i>
            <span>Stations</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
          User Management
        </div>
        <li class="nav-item active">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Drivers</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="<?php echo base_url(); ?>/dashboard/listdriver">List Drivers</a>
              <a class="collapse-item" href="<?php echo base_url(); ?>/dashboard/newdriver">Add Drivers</a>
            </div>
          </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
          Cars Management
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item active">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-car"></i>
            <span>Cars</span>
          </a>
          <div id="collapsethree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="<?php echo base_url(); ?>/dashboard/listcars">List Cars</a>
              <a class="collapse-item" href="<?php echo base_url(); ?>/dashboard/newcar">Add Cars</a>
            </div>
          </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
          Driving Days
        </div>

        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url(); ?>/dashboard/view_days">
            <i class="fas fa-fw fa-car"></i>
            <span>Driving Days</span></a>
        </li>
        <!-- Heading -->
            <!-- Divider -->
            <hr class="sidebar-divider">
         <!-- Heading -->
         <div class="sidebar-heading">
        Tanken Details
          </div>

          <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url(); ?>/dashboard/view_tanken">
            <i class="fas fa-gas-pump"></i>
            <span>Tanken</span></a>
          </li>
          <!-- Heading -->
              <!-- Divider -->
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
         Messages
        </div>

        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url(); ?>/dashboard/messages">
            <i class="fas fa-envelope"></i>
            <span>Driver Messages</span></a>
        </li>
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
      <!-- End of Sidebar -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

              <div class="topbar-divider d-none d-sm-block"></div>
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $admin_details[0]['first_name'] . " " . $admin_details[0]['last_name'];   ?></span>
                  <img class="img-profile rounded-circle" src="<?php echo base_url(); ?>/public/assets/img/admin.png">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href=<?php echo base_url() . "\dashboard\adminprofile"; ?>>
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href=<?php echo base_url() . "\dashboard\changepassword"; ?>>
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Change Password
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

        <?php
      }
        ?>
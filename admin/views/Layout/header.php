<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Test description">
   <meta name="title" content="Test title">
  <meta name="author" content="">

  <title>Property</title>
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>-->

 <link href="<?=base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?=base_url()?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url()?>assets/css/sb-admin.css" rel="stylesheet">

  <link rel="icon" href="<?=base_url('assets/images/logo.png')?>" type="image/gif" sizes="16x16">
 <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <style type="text/css">
  .scrollit {
    overflow:scroll;
    height:80%;
}
    a:hover {
   opacity: 0.5;
      filter: alpha(opacity=10);
}
span:hover{
   opacity: 0.5;
      filter: alpha(opacity=10);
  
}
</style>

 
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#"></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
  
    <span   style="color:white"><h2>Admin Panel</h2></span>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <!-- <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div> -->
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
     <!--  <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
     <!--  <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <!-- <a class="dropdown-item" href="#">Settings</a> -->
          <!-- <a class="dropdown-item" href="#">Activity Log</a> -->
          <!--<div class="dropdown-divider"></div>-->
          <a  href="<?=base_url('Login/logOut')?>" style="padding:2px 50px"> <strong>Logout</strong></a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">
    
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link " href="<?=base_url('Dashboard/viewDashbaord')?>" id="pagesDropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-list-alt" aria-hidden="true"></i>
          <span>Category</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?=base_url('Category/categorySection')?>"><i class="fa fa-plus" aria-hidden="true"></i> <strong>Add Expense Category</strong></a>
            <a class="dropdown-item" href="<?=base_url('Category/ViewcategorySection')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Expense Category</strong></a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa-user" aria-hidden="true"></i>
          <span>Owssner</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <!-- <h6 class="dropdown-header">Add Student</h6> -->
        
          <a class="dropdown-item" href="<?=base_url('admin/add-owner')?>">  <i class="fa fa-user-plus" aria-hidden="true"></i> <strong>Add Owner</strong></a>
           <a class="dropdown-item" href="<?=base_url('Owner/viewOwner_section')?>"> <i class="fa fa-users" aria-hidden="true"></i><strong> Owner</strong></a>
          <!-- <a class="dropdown-item" href="register.html">Register</a>
          <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.html">404 Page</a>
          <a class="dropdown-item" href="blank.html">Blank Page</a> -->
        </div>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-users" aria-hidden="true"></i>
          <span>Amenities</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <!-- <h6 class="dropdown-header">Add Student</h6> -->
          <a class="dropdown-item" href="<?=base_url('Building/amenitiesSection')?>"><i class="fas fa-user-plus"></i> <strong>Add Amenities</strong> </a>
       <a class="dropdown-item" href="<?=base_url('Building/ViewAmenitiesSection')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Amenities</strong></a>
          <!--<a class="dropdown-item" href="<?=base_url('Tenant/pastTenantSection')?>"><i class="fas fa-user-plus"></i> <strong>Add Past Tenant</strong></a>-->
          <!--<a class="dropdown-item" href="<?=base_url('Tenant/ViewPastTenantSection')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Past Tenant</strong> </a>-->
         
        </div>
      </li>
      

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-building" aria-hidden="true"></i>
          <span>Building</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <!-- <h6 class="dropdown-header">Add Student</h6> -->
          <a class="dropdown-item" href="<?=base_url('admin/add-building')?>"><i class="fas fa-city"></i> <strong>Add Building</strong></a>
          <a class="dropdown-item" href="<?=base_url('Building/ViewBuildingSection')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Building</strong></a>
          <!-- <a class="dropdown-item" href="login.html">View Class</a> -->
          <!-- <a class="dropdown-item" href="register.html">Register</a>
          <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.html">404 Page</a>
          <a class="dropdown-item" href="blank.html">Blank Page</a> -->
        </div>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-users" aria-hidden="true"></i>
          <span>Tenant</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <!-- <h6 class="dropdown-header">Add Student</h6> -->
          <a class="dropdown-item" href="<?=base_url('Tenant/currentTenantSection')?>"><i class="fas fa-user-plus"></i> <strong>Add Current Tenant</strong> </a>
       <a class="dropdown-item" href="<?=base_url('Tenant/ViewCurrentTenantSection')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Current Tenant</strong></a>
          <!--<a class="dropdown-item" href="<?=base_url('Tenant/pastTenantSection')?>"><i class="fas fa-user-plus"></i> <strong>Add Past Tenant</strong></a>-->
          <a class="dropdown-item" href="<?=base_url('Tenant/ViewPastTenantSection')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Past Tenant</strong> </a>
         
        </div>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-male" aria-hidden="true"></i>
          <span>Vendor</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?=base_url('Vendor/addVendorSection')?>"><i class="fas fa-user-plus"></i> <strong>Add Vendor</strong></a>
           <a class="dropdown-item" href="<?=base_url('Vendor/ViewVendorDetails')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Vendor</strong></a>
                
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-dollar-sign"></i>
          <span>Expense</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?=base_url('Expense/addExpenseSection')?>"><i class="fa fa-plus" aria-hidden="true"></i> <strong>Add Expense</strong> </a>
          <a class="dropdown-item" href="<?=base_url('Expense/viewExpenseData')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Expense</strong> </a>    
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa-blog"></i>
          <span>Blog</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?=base_url('Blog/addBlogSection')?>"><i class="fas fa-edit"></i> <strong>Add Blog</strong></a>
          <a class="dropdown-item" href="<?=base_url('Blog/ViewBlogSection')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Blog</strong> </a>    
        </div>
      </li>

      <!--<li class="nav-item dropdown">-->
      <!--  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
      <!--   <i class="fas fa-file"></i>-->
      <!--    <span>Reports</span>-->
      <!--  </a>-->
      <!--  <div class="dropdown-menu" aria-labelledby="pagesDropdown">-->
      <!--    <a class="dropdown-item" href="<?=base_url('')?>">Coming soon</a>-->
      <!--    <a class="dropdown-item" href="<?=base_url('')?>"></a> -->
      <!--    <a class="dropdown-item" href="<?=base_url('')?>"></a>-->
      <!--    <a class="dropdown-item" href="<?=base_url('')?>"></a>      -->
      <!--  </div>-->
      <!--</li>-->
      <!--<li class="nav-item dropdown">-->
      <!--  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
      <!--  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>-->
      <!--    <span>Alerts</span>-->
      <!--  </a>-->
      <!--  <div class="dropdown-menu" aria-labelledby="pagesDropdown">-->
      <!--    <a class="dropdown-item" href="<?=base_url('')?>">Late Tenants</a>-->
      <!--    <a class="dropdown-item" href="<?=base_url('')?>">Expired Leases</a> -->
               
      <!--  </div>-->
      <!--</li>-->
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-envelope-open-text"></i>
          <span>Email Template</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?=base_url('Template/templateSection')?>"><i class="fas fa-edit"></i> <strong>Add Template</strong></a>
            <a class="dropdown-item" href="<?=base_url('Template/viewEmailTemplate')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Template</strong> </a>
          <!-- <a class="dropdown-item" href="<?=base_url('')?>">Expired Leases</a> 
          <a class="dropdown-item" href="<?=base_url('')?>">Payments</a>  -->     
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-question-circle" aria-hidden="true"></i>
          <span>User Query</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?=base_url('Blog/ViewUserQuery')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Query</strong></a>
           <!--<a class="dropdown-item" href="<?=base_url('Blog/ViewJobPost')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Add JOb</strong></a>-->-->
            
        </div>
         
      </li> 
      <!-- <li class="nav-item">-->
      <!--  <a class="nav-link" href="charts.html">-->
      <!--    <i class="fas fa-fw fa-chart-area"></i>-->
      <!--    <span>Carts</span></a>-->
      <!--</li> -->
     <!--  <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li> -->
    </ul>
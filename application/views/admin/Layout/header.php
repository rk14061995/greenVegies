<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link href="<?=base_url()?>assets/css2/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-2 col-12" >
    			<div class="sidebar" id="side">
                    <div class="logo">
                        <h4 class="text-white admin p-3">Admin Panel</h4>
                        <a href="javascript:void(0)" class="closebtn" id="close">×</a>
                    </div>
			        <hr>
			        <div class="sidebar-wrapper ps ps--active-y" id="sidebar-wrapper">
			           <ul class="nav">
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
				              <a class="dropdown-item" href="<?=base_url('Category/categorySection')?>"><i class="fa fa-plus" aria-hidden="true"></i> <strong>Add Category</strong></a>
				                <a class="dropdown-item" href="<?=base_url('Category/ViewcategorySection')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong> Category</strong></a>
				            </div>
				          </li>
			                <li class="nav-item dropdown">
			                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                       <i class="fa fa-user" aria-hidden="true"></i>
			                       <span>Products</span>
			                    </a>
			                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
			                		<a class="dropdown-item" href="<?=base_url('Products/ProductsSection')?>">  <i class="fa fa-user-plus" aria-hidden="true"></i> <strong>Add Products</strong></a>
			                        <a class="dropdown-item" href="<?=base_url('Products/ViewProductSection')?>"> <i class="fa fa-users" aria-hidden="true"></i><strong> Products</strong></a>
			             	    </div>
			                </li>
			                <li class="nav-item dropdown">
			                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                        <i class="fa fa-users" aria-hidden="true"></i>
			                        <span>Banner</span>
			                    </a>
			                    <div class="dropdown-menu" aria-labelledby="pagesDropdown" style="">
			                        <a class="dropdown-item" href="<?=base_url('Products/BannerSection')?>"><i class="fas fa-user-plus"></i> <strong>Add Banner</strong> </a>
			                        <a class="dropdown-item" href="<?=base_url('Products/ViewBannerSection')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Banner</strong></a> 
			                    </div>
			                </li>
			                <li class="nav-item dropdown">
			                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                       <i class="fa fa-building" aria-hidden="true"></i>
			                       <span>Cart</span>
			                    </a>
			                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
			                        
			                        <a class="dropdown-item" href="<?=base_url('Building/ViewBuildingSection')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Cart</strong></a>
			              	    </div>
			                </li>
				           <li class="nav-item dropdown">
				            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				            <i class="fa fa-users" aria-hidden="true"></i>
				              <span>Feedback</span>
				            </a>
				            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
				              
				             <a class="dropdown-item" href="<?=base_url('Users/UsersFeedbackSection')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Users Feedback</strong></a>
				              
				             
				            </div>
				          </li>
				          <li class="nav-item dropdown">
				            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				              <i class="fa fa-male" aria-hidden="true"></i>
				              <span>Reviews</span>
				            </a>
				            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
				            
				               <a class="dropdown-item" href="<?=base_url('Users/UsersReviewsSection')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Users Reviews</strong></a>
				                    
				            </div>
				          </li>
				          <li class="nav-item dropdown">
				            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				              <i class="fa fa-male" aria-hidden="true"></i>
				              <span>Website Details</span>
				            </a>
				            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
				            
				               <a class="dropdown-item" href="<?=base_url('Admin/webDetails')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Website Details</strong></a>
				                    
				            </div>
				          </li>
				          
				          <li class="nav-item dropdown">
				            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				             <i class="fa fa-usd"></i>
				              <span>Users</span>
				            </a>
				            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
				              <!-- <a class="dropdown-item" href="<?=base_url('Expense/addExpenseSection')?>"><i class="fa fa-plus" aria-hidden="true"></i> <strong>Add Users</strong> </a> -->
				              <a class="dropdown-item" href="<?=base_url('Users/UsersDetailSection')?>"><i class="fa fa-eye" aria-hidden="true"></i> <strong>Users</strong> </a>    
				            </div>
				          </li>
				          
				         
				         
			            </ul>
				      <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
				      	<div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
				      </div>
				      <div class="ps__rail-y" style="top: 0px; height: 714px; right: 0px;">
				      	<div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 702px;"></div>
				      </div>
			       </div>
			    </div>
    		</div>
    		<div class="col-md-10 p-0 col-12" id="blue">
    	        <div class="panel-header panel-header-sm">
    	        	<div class="container-fluid">
	    	        	<div class="row">
	    	        		<div class="col-md-1 col-1">
	    	        			<i class="fa fa-bars bars" id="bar"></i>
	       	        		</div>
	    	        		<div class="col-md-2 col-3">
	    	        			<h6 class="text-white top">User profile</h6>
	       	        		</div>
	    	        		<div class="offset-md-6 col-md-2 col-6">
	    	        		  <form class="example top1" action="/action_page.php" >
	    	        			<input type="text" placeholder="Search.." name="search2" ><i class="fa fa-search icon-style"></i>
	    	        		  </form>
	    	        		</div>
	    	        		<div class="col-md-1 style  col-2">
	    	        			<ul class="navbar-nav ml-auto ml-md-0">
     
						      <li class="nav-item dropdown no-arrow">
						        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          <i class="fas fa-user-circle "></i>
						        </a>
						        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
						          
						          <a  href="<?=base_url('Login/logOut')?>" style="padding:2px 50px"> <strong>Logout</strong></a>
						        </div>
						      </li>
						    </ul>
	    	        			<!-- <a href="#" class="text-white"><i class="fa fa-user"></i></a> -->

	    	        		</div>
	    	        	</div>
	    	        </div>
                </div>
                <div class="main-panel">
 	                <div class="content-div p-5">


<script>
	$(document).ready(function(){
	  $("#bar").click(function(){
	    $("#side").show();
	     // $("#blue").hide();
	  });
	 
	});
</script>

<script>
	$(document).ready(function(){
	  $("#close").click(function(){
	  	$("#side").hide();
	    $("#blue").show();
	     
	  });
	 
	});
</script>
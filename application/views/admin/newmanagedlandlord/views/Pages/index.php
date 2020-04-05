


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?=base_url('Dashboard/viewDashbaord')?>">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                 
                <div class="card-body-icon">
                   <i class="fas fa-user"></i>
                </div>
                 <div class="mr-5">
                  Total Owners <?=$owner_dashboard?>
                      </div>
                
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?=base_url('Owner/viewOwner_section')?>">
                <span class="float-left">View Owner Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                 <i class="fas fa-building"></i>
                </div>
                <div class="mr-5">
                 <strong>Total Buildings</strong>  
                 <?=$building_dashboard?>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?=base_url('Building/ViewBuildingSection')?>">
                <span class="float-left">View Building Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                 <i class="fas fa-user"></i>
                </div>
                <div class="mr-5">
                 <strong>Total Current Tenant</strong>  
                 <?=$Currtenant_dashboard?>
                 </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?=base_url('Tenant/ViewCurrentTenantSection')?>">
                <span class="float-left">View Current Tenant Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                <i class="fas fa-user"></i>
                </div>
                <div class="mr-5">
                    <strong>Total Past Tenant</strong>
                    <?=$Pasttenant_dashboard?>
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="<?=base_url('Tenant/ViewPastTenantSection')?>">
                <span class="float-left">View Past Tenant Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        
    

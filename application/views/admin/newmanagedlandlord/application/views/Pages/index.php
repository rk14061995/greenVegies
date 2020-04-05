
            <h5 class="title font-weight-bold space bg-light p-3">Dashboard / Overview</h5>

            <div class="row mt-5">
               	<div class="col-md-3 mt-2">
            		<div class="card shadow bg-primary p-4">
            			<h6 class="font-weight-bold text-white">Total Owners <?=$owner_dashboard?></h6>
            			<hr>
            			<a href="<?=base_url('Owner/viewOwner_section')?>"><h6 class="text-white">View Owner Details</h6></a>
            		</div>
            	</div>
            	<div class="col-md-3 mt-2">
            		<div class="card shadow bg-warning p-4">
            			<h6 class="font-weight-bold text-white">Total Buildings <?=$building_dashboard?></h6>
            			<hr>
            			<a href="<?=base_url('Building/ViewBuildingSection')?>"><h6 class="text-white">View Building Details</h6></a>
            		</div>
            	</div>
            	<div class="col-md-3 mt-2">
            		<div class="card shadow bg-success p-4">
            			<h6 class="font-weight-bold text-white">Total Current Tenant <?=$Currtenant_dashboard?></h6>
            			<hr>
            			<a href="<?=base_url('Tenant/ViewCurrentTenantSection')?>"><h6 class="text-white">View Current Tenant Details</h6></a>
            		</div>
            	</div>
            	<div class="col-md-3 mt-2">
            		<div class="card shadow bg-danger p-4">
            			<h6 class="font-weight-bold text-white">Total Past Tenant  <?=$Pasttenant_dashboard?></h6>
            			<hr>
            			<a href="<?=base_url('Tenant/ViewPastTenantSection')?>"><h6 class="text-white">View Past Tenant Details</h6></a>
            		</div>
            	</div>
            </div>
	      </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
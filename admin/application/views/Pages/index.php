
            <h5 class="title font-weight-bold space bg-light p-3">Dashboard / Overview</h5>

            <div class="row mt-5">
               	<div class="col-md-3 mt-2">
            		<div class="card shadow bg-primary p-4">
            			<h6 class="font-weight-bold text-white">Total Categories <?=$category_dashboard?></h6>
            			<hr>
            			<a href="<?=base_url('Category/ViewcategorySection')?>"><h6 class="text-white">View Categories Details</h6></a>
            		</div>
            	</div>
            	<div class="col-md-3 mt-2">
            		<div class="card shadow bg-warning p-4">
            			<h6 class="font-weight-bold text-white">Total Products <?=$product_dashboard?></h6>
            			<hr>
            			<a href="<?=base_url('Products/ViewProductSection')?>"><h6 class="text-white">View Products Details</h6></a>
            		</div>
            	</div>
            	<div class="col-md-3 mt-2">
            		<div class="card shadow bg-success p-4">
            			<h6 class="font-weight-bold text-white">Total Users  <?=$user_dashboard?></h6>
            			<hr>
            			<a href="<?=base_url('Users/UsersDetailSection')?>"><h6 class="text-white">View Users Details</h6></a>
            		</div>
            	</div>
            	<div class="col-md-3 mt-2">
            		<div class="card shadow bg-danger p-4">
            			<h6 class="font-weight-bold text-white">Total Feedback  <?=$feedback_dashboard?></h6>
            			<hr>
            			<a href="<?=base_url('Users/UsersFeedbackSection')?>"><h6 class="text-white">View Feedback Details</h6></a>
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
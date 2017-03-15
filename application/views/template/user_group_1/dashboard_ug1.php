<?php

$date = date('Y-m-d');
 // Admin Dashboard
$user_name = $this->userdata[0]->name;
?>
<div id="page-wrapper" class="gray-bg">
	<br>
		<?php if( $this->userdata[0]->sales_grp_lead !== "") { ?>
		<div class="pull-right">
			<form method="GET">
				<?php
                 if($_GET['date_range']):
                 ?>
				<input type="hidden" name="date_range" value="
					<?php echo $date_range; ?>">
					<?php endif; ?>
					<label>Select Team Member: </label>
					<select class="selectpicker show-tick form-control allcaps" data-live-search="true" name="selected_userid" onChange="this.form.submit();">
						<?php
						 $selected_userid= $_GET['selected_userid'];
						 $user_selected_name =get_query('name','users',"username = '$selected_userid'");
						 $user_selected_data=mysqli_fetch_array($user_selected_name,MYSQLI_NUM);
						?>
						<option value="
							<?php echo $user_selected_data[0]; ?>">
						</option>
						<?php
						 $sales_grp_lead= $this->userdata[0]->sales_grp_lead;
						 $branch =  $this->userdata[0]->branch;
						 $user = get_query('username, name', 'users', " branch = '$branch' AND user_group = '2' AND sales_grp='$sales_grp_lead'");
						 while($user_data = mysqli_fetch_array($user, MYSQLI_NUM)):
						 if($user_id != $user_data[0]):
						 ?>
						<option value="
							<?php echo $user_data[0]; ?>">
							<?php echo $user_data[1]; ?>
						</option>
						<?php endif; endwhile; ?>
					</select>
				</form>
				<div class="clearfix"></div>
				<?php if($_GET['selected_userid']): ?>
				<a href="index" class="btn btn-primary">Reset</a>
				<?php endif; ?>
			</div>
			<div class="clearfix"></div>
			<br>
				<?php } ?>
				<div class="wrapper wrapper-content">
					<div class="row">
						<a href="allprojects">
							<div class="col-lg-3 simple-tooltip" title="Total number of project(s). Click to see details ">
								<div class="ibox float-e-margins">
									<div class="ibox-title">
										<span class="label label-success pull-right">Total Projects</span>
										<h5>Projects</h5>
									</div>
									<div class="ibox-content">
										<h1 class="no-margins">
											<?php
											 if($_GET){
											 $user_id=$_GET['selected_userid'];
											 echo $this->gp1_model->total_projests_count($user_id,'');
											 }else {
											 echo $this->gp1_model->total_projests_count('','');
											 }
											 ?>
										</h1>
									</div>
								</div>
							</div>
						</a>
						<a href="allclients">
							<div class="col-lg-3 simple-tooltip" title="Total number of client(s). Click to see details ">
								<div class="ibox float-e-margins">
									<div class="ibox-title">
										<span class="label label-info pull-right">Total Clients</span>
										<h5>Clients</h5>
									</div>
									<div class="ibox-content">
										<h1 class="no-margins">
											<?php
											 if($_GET){
											 $user_id_team=$_GET['selected_userid'];
											 $uid= get_query('name','users'," username ='$user_id_team'");
											 $uid_data = mysqli_fetch_array($uid, MYSQLI_NUM);
											 $client_sales_executive =$uid_data[0];
											 echo $this->gp1_model->total_clients($client_sales_executive,'');
											 }else {
											 echo $this->gp1_model->total_clients('','');
											 }
											 ?>
										</h1>
										<!-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div><small>New orders</small> -->
									</div>
								</div>
							</div>
						</a>
						<a href="completedprojects">
							<div class="col-lg-3 simple-tooltip" title="Total number of completed project(s). Click to see details ">
								<div class="ibox float-e-margins">
									<div class="ibox-title">
										<span class="label label-primary pull-right">Completed</span>
										<h5>Projects</h5>
									</div>
									<div class="ibox-content">
										<h1 class="no-margins">
											<?php
											 if($_GET){
											 $user_id=$_GET['selected_userid'];
											 echo $this->gp1_model->total_completed($user_id,'');
											 }else {
											  echo $this->gp1_model->total_completed('','');
											 }
											
											 ?>
										</h1>
										<!-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div><small>New visits</small> -->
									</div>
								</div>
							</div>
						</a>
						<a href="ongoingprojects">
							<div class="col-lg-3 simple-tooltip" title="Total number of ongoing project(s). Click to see details ">
								<div class="ibox float-e-margins">
									<div class="ibox-title">
										<span class="label label-danger pull-right">Ongoing</span>
										<h5>Projects</h5>
									</div>
									<div class="ibox-content">
										<h1 class="no-margins">
											<?php
											 if($_GET){
											 $user_id=$_GET['selected_userid'];
											 echo $this->gp1_model->total_ongoing($user_id,'');
											 } else {
											 echo $this->gp1_model->total_ongoing('','');
											 }
											 ?>
										</h1>
										<!-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div><small>In first month</small> -->
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-12">
									<div class="ibox float-e-margins">
										<div class="ibox-title">
											<h5>Project Details (Latest Projects)</h5>
											<div class="ibox-tools">
												<a class="collapse-link simple-tooltip" title="Collapse">
													<i class="fa fa-chevron-up"></i>
												</a>
												<a class="close-link simple-tooltip" title="Close">
													<i class="fa fa-times"></i>
												</a>
											</div>
										</div>
										<div class="ibox-content">
											<?php
											 // if($_GET){
											 // $user_id=$_GET['selected_userid'];
											 //  echo $project_count=$this->gp1_model->total_projests_count($user_id,'');
											 //  }
											 //  else 

											   // $project_count=$this->gp1_model->total_projests_count('','');
											  
											
											 ?>
											<table class="table table-hover no-margins">
												<thead>
													<tr>
														<th>Client</th>
														<th>Project</th>
														<th>Duration</th>
														<th>Pending Task(s)</th>
														<th>Progress</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<?php
													 
													 
													  
													 ?>
													<tr>
														<td>
															
															<?php foreach($get_project->result() as $row){
															
                                                              echo $row->client_company_name;
																}?>
														</td>
														<td>
															<?php foreach ($get_project->result() as $row) {
																echo $row->project_title;
															}  ?>
														</td>
														<td>
															<?php foreach ($get_project->result() as $row) {
																echo $row->project_duration;
															}  ?>
															
														</td>
														<td>
															 
															 <?php foreach ($get_project->result() as $row) {
																echo $row->milestones_category;
																// echo $total_count = count($row->milestones_id);
															}  
                                                             
															?>
															<br>
																<br>
																	
																</td>
																<?php if($completed_percentage <= 25) { ?>
																<td class="text-red " style="backgraound-color= red;">
																	<i class="fa fa-level-up"></i>
																	<?php echo $completed_percentage; ?>% 
																</td>
																<?php } ?>
																<?php if($completed_percentage > 25 AND $completed_percentage<= 50) { ?>
																<td class="text-orange " style="backgraound-color= red;">
																	<i class="fa fa-level-up"></i>
																	<?php echo $completed_percentage; ?>% 
																</td>
																<?php } ?>
																<?php if($completed_percentage > 50 AND $completed_percentage<= 75) { ?>
																<td class="text-blue " style="backgraound-color= red;">
																	<i class="fa fa-level-up"></i>
																	<?php echo $completed_percentage; ?>% 
																</td>
																<?php } ?>
																<?php if($completed_percentage > 75 ) { ?>
																<td class="text-green " style="backgraound-color= red;">
																	<i class="fa fa-level-up"></i>
																	<?php echo $completed_percentage; ?>% 
																</td>
																<?php } ?>
																<td>
																	<a href="projectdetails?project_id=
																		<?php echo $data1[1]; ?>" class="text-navy">
																		<i class="fa fa-eye"> Details</i>
																	</a>
																</td>
															</tr>
															<?php ?>
														</tbody>
													</table>
													<?php
													  ?>
												</div>
											</div>
											
										</div>
									</div>
								</div>
<?php
 
 ?>
<?php 
$date = date('Y-m-d');
if($_SESSION['user_role_id'] == 1 || $_SESSION['user_group'] == 2 ){ // Admin Dashboard
$user_name = $_SESSION['name'];
?>

<div id="page-wrapper" class="gray-bg">
<?php include_once "includes/top-menu.php"; ?>
<br>
<?php if($_SESSION['sales_grp_lead'] !== "") { ?>
<div class="pull-right">
 <form method="GET">
 <?php
 if($_GET['date_range']){
 ?>
 <input type="hidden" name="date_range" value="<?php echo $date_range; ?>">
 <?php } ?>
 <label>Select Team Member: </label>
 <select class="selectpicker show-tick form-control allcaps" data-live-search="true" name="selected_userid" onChange="this.form.submit();">
 <?php
 $selected_userid= $_GET['selected_userid'];
 // $user_selected_name =get_query('name','users',"username = '$selected_userid'");
 
 $user_selected_data=mysqli_fetch_array($user_selected_name,MYSQLI_NUM);
 ?>
 <option value="<?php echo $user_selected_data[0]; ?>"></option>
 <?php
 $sales_grp_lead= $_SESSION['sales_grp_lead'];
 $branch = $_SESSION['branch'];
 $user = get_query('username, name', 'users', " branch = '$branch' AND user_group = '2' AND sales_grp='$sales_grp_lead'");
 while($user_data = mysqli_fetch_array($user, MYSQLI_NUM)):
 if($user_id != $user_data[0]):
 ?>
 <option value="<?php echo $user_data[0]; ?>"><?php echo $user_data[1]; ?></option>
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
 <div class="row"> <a href="allprojects">
 <div class="col-lg-3 simple-tooltip" title="Total number of project(s). Click to see details ">
 <div class="ibox float-e-margins">
 <div class="ibox-title"> <span class="label label-success pull-right">Total Projects</span>
 <h5>Projects</h5>
 </div>
 <div class="ibox-content">
 <h1 class="no-margins">
 <?php
 if($_GET){
 $user_id=$_GET['selected_userid'];
 echo get_count('*', 'projects', " project_sales_executive_id = '$user_id' ");
 }else if($_SESSION['user_group'] == 2){
 echo get_count('*', 'projects', " project_sales_executive = '$user_name' ");
 }else if($_SESSION['user_role_id'] == 1 || $_SESSION['user_role_id'] == 4) {
 echo get_count('*', 'projects', '');
 }
 ?>
 </h1>
 <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
 <!-- <small>Total Projects</small> -->
 </div>
 </div>
 </div>
 </a> <a href="allclients">
 <div class="col-lg-3 simple-tooltip" title="Total number of client(s). Click to see details ">
 <div class="ibox float-e-margins">
 <div class="ibox-title"> <span class="label label-info pull-right">Total Clients</span>
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
 echo get_count('*', 'clients', "client_sales_executive = '$client_sales_executive' ");
 }else if($_SESSION['user_role_id'] == 1 || $_SESSION['user_role_id'] == 4){
 echo get_count('*', 'clients', '');
 }else if($_SESSION['user_group'] == 2){
 echo get_count('*', 'clients', " client_sales_executive = '$user_name' ");
 }
 ?>
 </h1>
 <!-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
 <small>New orders</small> -->
 </div>
 </div>
 </div>
 </a> <a href="completedprojects">
 <div class="col-lg-3 simple-tooltip" title="Total number of completed project(s). Click to see details ">
 <div class="ibox float-e-margins">
 <div class="ibox-title"> <span class="label label-primary pull-right">Completed</span>
 <h5>Projects</h5>
 </div>
 <div class="ibox-content">
 <h1 class="no-margins">
 <?php
 if($_GET){
 $user_id=$_GET['selected_userid'];
 echo get_count('*', 'projects', " project_sales_executive_id = '$user_id' AND project_status = 'completed'");
 }else if($_SESSION['user_role_id'] == 1 || $_SESSION['user_role_id'] == 4){
 echo get_count('*', 'projects', "project_status = 'completed'");
 }
 else if($_SESSION['user_group'] == 2){
 echo get_count('*', 'projects', "project_status = 'completed' AND project_sales_executive = '$user_name' ");
 }
 ?>
 </h1>
 <!-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
 <small>New visits</small> -->
 </div>
 </div>
 </div>
 </a> <a href="ongoingprojects">
 <div class="col-lg-3 simple-tooltip" title="Total number of ongoing project(s). Click to see details ">
 <div class="ibox float-e-margins">
 <div class="ibox-title"> <span class="label label-danger pull-right">Ongoing</span>
 <h5>Projects</h5>
 </div>
 <div class="ibox-content">
 <h1 class="no-margins">
 <?php
 if($_GET){
 $user_id=$_GET['selected_userid'];
 echo get_count('*', 'projects', " project_sales_executive_id = '$user_id' AND project_status = 'ongoing' ");
 } else if($_SESSION['user_role_id'] == 1 || $_SESSION['user_role_id'] == 4){
 echo get_count('*', 'projects', "project_status = 'ongoing'");
 }
 else if($_SESSION['user_group'] == 2){
 echo get_count('*', 'projects', "project_status = 'ongoing' AND project_sales_executive = '$user_name' ");
 }
 ?>
 </h1>
 <!-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
 <small>In first month</small> -->
 </div>
 </div>
 </div>
 </a> </div>
 <div class="row">
 <div class="col-lg-12">
 <div class="row">
 <div class="col-lg-12">
 <div class="ibox float-e-margins">
 <div class="ibox-title">
 <h5>Project Details (Latest Projects)</h5>
 <div class="ibox-tools"> <a class="collapse-link simple-tooltip" title="Collapse"> <i class="fa fa-chevron-up"></i> </a> <a class="close-link simple-tooltip" title="Close"> <i class="fa fa-times"></i> </a> </div>
 </div>
 <div class="ibox-content">
 <?php
 if($_GET){
 $user_id=$_GET['selected_userid'];
 $project_count= get_count('*', 'projects', " project_sales_executive_id = '$user_id' ");
 }
 else if($_SESSION['user_role_id'] == 1 || $_SESSION['user_role_id'] == 4){
 $project_count = get_count('*', 'projects', '');
 }
 else if($_SESSION['user_group'] == 2){
 $project_count = get_count('*', 'projects', " project_sales_executive = '$user_name' ");
 }
 if($project_count){
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
 if($_GET){
 $user_id=$_GET['selected_userid'];
 $query1= get_query('project_client_id, project_id, project_title, project_duration', 'projects', " project_sales_executive_id = '$user_id ' AND project_status = 'ongoing' ORDER BY project_date_created DESC LIMIT 5 ");
 }
 else if($_SESSION['user_role_id'] == 1 || $_SESSION['user_role_id'] == 4){
 $query1 = get_query('project_client_id, project_id, project_title, project_duration', 'projects '," project_status='ongoing' ORDER BY project_date_created DESC LIMIT 5 ");
 }
 else if($_SESSION['user_group'] == 2){
 $query1 = get_query('project_client_id, project_id, project_title, project_duration', 'projects', " project_sales_executive = '$user_name' AND project_status = 'ongoing' ORDER BY project_date_created DESC LIMIT 5");
 }
 while($data1 = mysqli_fetch_array($query1, MYSQLI_NUM)):
 $query2 = get_query('client_company_name', 'clients', "client_id = '$data1[0]'");
 $data2 = mysqli_fetch_array($query2, MYSQLI_NUM);
 $total_count = get_count('*', 'milestones', "milestones_project_id = '$data1[1]'");
 $completed_count = get_count('*', 'milestones', "milestones_project_id = '$data1[1]' AND milestones_status = 'completed'");
 $completed_percentage = $completed_count / $total_count * 100;
 ?>
 <tr>
 <td><?php echo $data2[0];?></td>
 <td><?php echo $data1[2]; ?></td>
 <td><?php echo $data1[3]; ?></td>
 <td><?php $query_milestone=get_query('milestones_category','milestones',"milestones_status='ongoing' AND milestones_project_id='$data1[1]'");
 while($data_milestone=mysqli_fetch_array($query_milestone,MYSQLI_NUM)):
 ?>
 <?php echo $data_milestone[0]; ?>, <br>
 <br>
 <?php endwhile; ?></td>
 <?php if($completed_percentage <= 25) { ?>
 <td class="text-red " style="backgraound-color= red;"><i class="fa fa-level-up"></i> <?php echo $completed_percentage; ?>% </td>
 <?php } ?>
 <?php if($completed_percentage > 25 AND $completed_percentage<= 50) { ?>
 <td class="text-orange " style="backgraound-color= red;"><i class="fa fa-level-up"></i> <?php echo $completed_percentage; ?>% </td>
 <?php } ?>
 <?php if($completed_percentage > 50 AND $completed_percentage<= 75) { ?>
 <td class="text-blue " style="backgraound-color= red;"><i class="fa fa-level-up"></i> <?php echo $completed_percentage; ?>% </td>
 <?php } ?>
 <?php if($completed_percentage > 75 ) { ?>
 <td class="text-green " style="backgraound-color= red;"><i class="fa fa-level-up"></i> <?php echo $completed_percentage; ?>% </td>
 <?php } ?>
 <td><a href="projectdetails?project_id=<?php echo $data1[1]; ?>" class="text-navy"><i class="fa fa-eye"> Details</i> </a></td>
 </tr>
 <?php endwhile; ?>
 </tbody>
 </table>
 <?php
 }else{
 ?>
 <p class="text-center font-20">No projects found!</p>
 <?php } ?>
 </div>
 </div>
 <?php if($_SESSION['user_role_id'] == 1 || $_SESSION['user_group'] == 8) : ?>
 <div class="row">
 <div class="col-lg-12">
 <div class="ibox float-e-margins">
 <div class="ibox-title">
 <h5>Follow Up Call Details</h5>
 <div class="ibox-tools"> <a class="collapse-link simple-tooltip" title="Collapse"> <i class="fa fa-chevron-up"></i> </a> <a class="close-link simple-tooltip" title="Close"> <i class="fa fa-times"></i> </a> </div>
 </div>
 <div class="ibox-content">
 <table class="table table-hover no-margins">
 <thead>
 <tr>
 <th>Company Name</th>
 <th>Follow Up Date</th>
 <?php if($_SESSION['user_role_id'] == 1 ): ?>
 <th>Support Executive</th>
 <?php endif; ?>
 <th>Details</th>
 </tr>
 </thead>
 <tbody>
 <?php
 $i = 0;
 $query1 = get_query('customer_id, follow_up_date, added_by', 'customer_service_updates ORDER BY follow_up_date DESC LIMIT 10', '');
 while($data1 = mysqli_fetch_array($query1, MYSQLI_NUM)):
 $query2 = get_query('client_company_name', 'clients', "client_id = '$data1[0]'");
 $data2 = mysqli_fetch_array($query2, MYSQLI_NUM);
 $executive_query = get_query('name', 'users', " username = '$data1[2]' ");
 $executive_data = mysqli_fetch_array($executive_query, MYSQLI_NUM);
 ?>
 <tr>
 <td><?php echo $data2[0];?></td>
 <td><?php echo $data1[1]; ?></td>
 <?php if($_SESSION['user_role_id'] == 1 ): ?>
 <td><?php echo $executive_data[0]; ?></td>
 <?php endif; ?>
 <td><form id="form<?php echo $i; ?>" action="customer-details" method="POST">
 <input type="hidden" value="<?php echo $data1[0]; ?>" name="company_id" />
 <a href="#" onClick="document.getElementById('form<?php echo $i; ?>').submit();">Details</a>
 </form></td>
 </tr>
 <?php $i++; endwhile; ?>
 </tbody>
 </table>
 </div>
 </div>
 </div>
 </div>
 <!--</div>-->
 <?php endif; ?>

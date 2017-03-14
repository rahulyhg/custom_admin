        <?php  $gp = $this->userdata[0]->group_no; ?>
         <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">

                    <!-- Menu header part -->
                    <li class="nav-header">
                        <div class="dropdown profile-element"> 
                             <span class="profile-image simple-tooltip" title="Profile pic" style="background: url('<?php if(!     $this->userdata[0]->profile_image){ base_url();  echo 'assets/img/user.png'; }else { echo $this->userdata[0]->profile_image; } ?>');"></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0);">
                                <span class="clear">
                                    <span class="block m-t-xs">
                                        <strong class="font-bold">
                                            <?php echo $this->userdata[0]->name; ?>
                                        </strong>
                                    </span>
                                    <span class="text-muted text-xs block">
                                        <?php echo $this->userdata[0]->user_role_name; ?> <b class="caret"></b>
                                    </span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="view_profile">Veiw Your Profile</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#profile-image">Update Profile Pic</a></li>
                                <li><a href="#">Contacts</a></li>
                                <li class="divider"></li>
                                <li><a href="functions/logout">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            CRM
                        </div>
                    </li>
                    <!-- end menu header part -->
                    <!-- update-profile-popup -->
                     <div class="modal fade" id="profile-image" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                       <div class="modal-content">
                              <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                   <h4 class="modal-title">Update Profile Pic</h4>
                              </div>
                              <div class="modal-body">
                                   <form class="form" action="functions/updateprofileimage" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Update Profile Pic</l>
                                        <input type="file" name="file" id="file" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                   </form>
                              </div>
                           </div>
                        </div>
                     </div>

                    <!-- Dashboard -->
                    <li <?php if($current_page == 'Dashboard') : ?>class="active" <?php endif; ?>>
                        <a href="index"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <!-- end dashboard -->

                   <!-- user restriction (links for only admin & coordinator) -->
                    <?php
                        if($this->userdata[0]->user_group == 1 || $this->userdata[0]->user_role_id == 4 || $this->userdata[0]->user_group == 2 ||$this->userdata[0]->user_role_id == 15 ):
                    ?>

                    <!-- projects -->
                    <li <?php if($current_page == 'projects' || $current_page == 'allprojects') : ?>class="active" <?php endif; ?>>
                        <a href="#"><i class="fa fa-cube"></i> <span class="nav-label">Projects <label class="label label-info pull-right"> <?php
		                        		if($this->userdata[0]->user_group == 1 ||
		                        			$this->userdata[0]->user_role_id == 4){
			                        			
                                               echo $this->common_model->count_projects('','','');
			                        	} else if($this->userdata[0]->team_lead == 1 && $this->userdata[0]->user_group == 8){
				                        	$type = $this->db->user_client_type;
				                        	
                                            echo $this->common_model->count_projects($type,'','');
				                        }else if( $this->userdata[0]->user_group == 9){
					                        $type = $this->userdata[0]->user_client_type;
					                        $user_id =  $this->userdata[0]->user_id;
				                        	echo $this->common_model->count_projects($type,$user_id,'');
					                    }else{
				                        	
                                            $user_name= $this->userdata[0]->name;
                                            echo $this->common_model->count_projects('','',$user_name);
				                        }
				                    ?>  </label></span></a>
                        <ul class="nav nav-second-level collapse padding-fix">
                            <?php if($this->userdata[0]->user_role_id == 1 || $this->userdata[0]->user_group == 2 ||$this->userdata[0]->team_lead == 1) : ?><li><a href="<?php echo base_url();?><?php echo $gp; ?>/add_project"><i class="fa fa-plus"></i> Add Project</a></li><?php endif; ?>
                            <li><a href="completedprojects"><i class="fa fa-check"></i> Completed Projects <label class="label label-info pull-right"> <?php
												if($this->userdata[0]->user_group == 1 || $this->userdata[0]->user_role_id == 4 ) {
														echo $this->common_model->count_completed_projects('','','');
												}
												else if($this->userdata[0]->user_group == 8 && $this->userdata[0]->team_lead == 1){
													$type = $this->userdata[0]->user_client_type;
													echo $this->common_model->count_completed_projects($type,'','');
												}
												else if($this->userdata[0]->user_group == 9){
													$type = $this->userdata[0]->user_client_type;
													$user_id = $this->userdata[0]->user_id;
													echo $this->common_model->count_completed_projects($type,$user_id,'');
												}
												else{
                                                     $user_name= $this->userdata[0]->name;
													echo $this->common_model->count_completed_projects('','',$user_name);
												}
											?> </label></a></li>
                            <li><a href="ongoingprojects"><i class="fa fa-spinner fa-pulse"></i> Ongoing Projects <label class="label label-info pull-right"> <?php
												if($this->userdata[0]->user_group == 1 || $this->userdata[0]->user_role_id == 4) {
														
                                                      echo $this->common_model->count_ongoing('','','');
												} else if($this->userdata[0]->team_lead == 1 && $this->userdata[0]->user_group == 8){
													$type =$this->userdata[0]->user_client_type;
													echo $this->common_model->count_ongoing($type,'','');
												}
												else if($this->userdata[0]->user_group == 9){
													$type = $this->userdata[0]->user_client_type;
													$user_id =$this->userdata[0]->user_id;
													echo $this->common_model->count_ongoing($type,$user_id,'');
												}
												else{
													 $user_name= $this->userdata[0]->name;
                                                    echo $this->common_model->count_ongoing('','',$user_name);

												}
											?> </label></a></li>
                            <li><a href="allprojects"><i class="fa fa-cubes"></i> All Projects</a></li>
                        </ul>
                    </li>
                    <!-- end projects -->

                    <!-- company -->
                    <li <?php if($current_page == 'clients') : ?>class="active" <?php endif; ?>>
                        <a href="#"><i class="fa fa-university"></i> <span class="nav-label">Company <label class="label label-info pull-right"> <?php
		                        		if($this->userdata[0]->user_group == 1 ||
		                        			$this->userdata[0]->user_role_id == 4
		                        			){
                                               echo $this->common_model->count_company('','','');
			                        	}else if($this->userdata[0]->team_lead == 1 && $this->userdata[0]->user_group == 8){
				                        	
				                        	$type = $this->userdata[0]->user_client_type;
                                             echo $this->common_model->count_company($type,'','');
				                        	
				                        }else if($this->userdata[0]->user_group == 9){
					                       
				                        	$type = $this->userdata[0]->user_client_type;
				                        	$user_id = $this->userdata[0]->user_id;
				                        	echo $this->common_model->count_company($type,$user_id,'');
					                    } else{
                                            $user_name= $this->userdata[0]->name;
				                        	echo $this->common_model->count_company('','',$user_name);
				                        }
									?> </label></span></a>
                        <ul class="nav nav-second-level collapse">
                            <?php if($this->userdata[0]->user_role_id == 1 || $this->userdata[0]->user_group == 2 || $this->userdata[0]->team_lead == 1) : ?><li><a href="addnewclient"><i class="fa fa-plus"></i> Add Company</a></li><?php endif; ?>
                            <li><a href="allclients"><i class="fa fa-check"></i> All Company</a></li>
                        </ul>
                    </li>
                    <!-- end company -->

                    <?php
                        if($this->userdata[0]->user_role_id == 1 || $this->userdata[0]->user_role_id == 4 ):
                    ?>
                    <li <?php if($current_page == 'individualtasks') : ?>class="active" <?php endif; ?>>
                        <a href="individualtasks"><i class="glyphicon glyphicon-th"></i> <span class="nav-label">Individual Tasks</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if($this->userdata[0]->user_group == 3 ): ?>
                    <li <?php if($current_page == 'worksheet') : ?>class="active" <?php endif; ?>>
                        <a href="worksheet"><i class="fa fa-calendar"></i> <span class="nav-label">Worksheet Calendar</span></a>
                    </li>
                    <?php endif; ?>

                    <!-- user restriction -->
                    <?php if($this->userdata[0]->user_role_id == 12 || $this->userdata[0]->user_role_id == 1 || $this->userdata[0]->user_group == 8 || $this->userdata[0]->user_group == 9 ) : ?>

                    <!-- customer services -->
                    <li <?php if($current_page == 'customer-details') : ?>class="active" <?php endif; ?>>
                        <a href="customer-details"><i class="fa fa-truck"></i> <span class="nav-label">Customer Services </span></a>
                        <ul class="nav nav-second-level collapse">
                        <li <?php if($current_page == 'customer-details') : ?>class="active" <?php endif; ?>><a href="customer-details"><i class="fa fa-truck"></i> Customer Services</a></li>
                        <li <?php if($current_page == 'customer_service_dashboard') : ?>class="active" <?php endif; ?>><a href="customer_service_dashboard"><i class="fa fa-tachometer"></i> Dashboard</a></li>

                        </ul>
                    </li>
                    <!-- end-customer-services -->

                    <!-- Add Postings
                    <li <?php if($current_page == 'addposting' || $current_page == 'alladdposting') : ?>class="active" <?php endif; ?>>
                        <a href="#">
                            <i class="fa fa-plus-square"></i>
                            <span class="nav-label">Add Posting
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <?php if($_SESSION['user_role_id'] != 1): ?><li <?php if($current_page == 'addposting') : ?>class="active" <?php endif; ?>><a href="addposting"><i class="fa fa-plus"></i> Add New Posting</a></li><?php endif; ?>
                            <li <?php if($current_page == 'alladdposting') : ?>class="active" <?php endif; ?>><a href="alladdposting"><i class="fa fa-check"></i> All Posting</a></li>
                        </ul>
                    </li>
                    end add postings -->

                    <!-- enquiry reporting -->
                    <li <?php if($current_page == 'enquiryreporting' || $current_page == 'allenquiryreporting') : ?>class="active" <?php endif; ?>>
                        <a href="#">
                            <i class="fa fa-file-text"></i>
                            <span class="nav-label">Enquiry Reporting
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <?php if($this->userdata[0]->user_role_id != 1): ?><li <?php if($current_page == 'enquiryreporting') : ?>class="active" <?php endif; ?>><a href="enquiryreporting"><i class="fa fa-plus"></i> Add New Reporting</a></li><?php endif; ?>
                            <li <?php if($current_page == 'allenquiryreporting') : ?>class="active" <?php endif; ?>><a href="allenquiryreporting"><i class="fa fa-check"></i> All Reporting</a></li>
                            <li <?php if($current_page == 'enquiry_dash') : ?>class="active" <?php endif; ?>><a href="enquiry_dash"><i class="fa fa-dashboard"></i> Enquiry Dashboard</a></li>
                        </ul>
                    </li>
                    <!-- end enquiry reporting -->
                    <!-- leads -->
                    <!-- <li <?php if($current_page == 'leads' || $current_page == 'leads_display') : ?>class="active" <?php endif; ?>>
                        <a href="#">
                            <i class="fa fa-dot-circle-o"></i>
                            <span class="nav-label">Leads
                        </a>
                        <ul class="nav nav-second-level collapse">

                            <li <?php if($current_page == 'leads') : ?>class="active" <?php endif; ?>><a href="leads"><i class="fa fa-check"></i> Leads</a></li>
                            <li <?php if($current_page == 'leads_display') : ?>class="active" <?php endif; ?>><a href="leads_display"><i class="fa fa-dashboard"></i> Leads display</a></li>
                            <?php if($_SESSION['team_lead']==1) { ?>
                            <li <?php if($current_page == 'leads_allocation') : ?>class="active" <?php endif; ?>><a href="leads_allocation"><i class="fa fa-thumb-tack"></i> Leads Allocation</a></li>
                            <?php } ?>
                        </ul>
                    </li> -->
                    <!-- end enquiry reporting -->

                    <!-- enquiry tracking -->
                    <li <?php if($current_page == 'enquiry-tracking') : ?>class="active" <?php endif; ?>>
                        <a href="enquiry-tracking"><i class="fa fa-cog fa-spin"></i> <span class="nav-label">Enquiry Tracking </span></a>
                    </li>
                    <!-- end enquiry tracking -->

                    <?php endif; ?>
                    <!-- end user restriction -->


                    <!-- user restriction (only for admin) -->
                    <?php if($this->userdata[0]->user_role_id == 1) : ?>

                    <?php endif; ?>
                    <!-- end sales report -->

                    <?php if($this->userdata[0]->user_role_id == 1) : ?>

                    <?php endif; ?>

                    <?php endif; ?>
                    <!-- end user restriction -->

                    <!-- user restriction -->
                    <?php if($this->userdata[0]->user_role_id == 8): ?>

                    <!-- adwords reports -->
                    <li <?php if($current_page == 'adwordsreport' || $current_page == 'alladwordsreports') : ?>class="active" <?php endif; ?>>
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span class="nav-label">Adwords Reporting</span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li <?php if($current_page == 'adwordsreport') : ?>class="active" <?php endif; ?>><a href="adwordsreport"><i class="fa fa-plus"></i> Add New Report</a></li>
                            <li <?php if($current_page == 'alladwordsreports') : ?>class="active" <?php endif; ?>><a href="alladwordsreports"><i class="fa fa-check"></i> All Reports</a></li>
                        </ul>
                    </li>
                    <!-- end adwords reports -->

                    <?php endif; ?>
                    <!-- end user restriction -->

                    <?php if($this->userdata[0]->user_group == 1 || $this->userdata[0]->user_group == 7): ?>
                    <!-- fb planner & activity -->
                    <li <?php if($current_page == 'fb-planner' || $current_page == 'db-activity' || $current_page == 'view-fb-history') : ?>class="active" <?php endif; ?>>
                        <a href="#">
                            <i class="fa fa-facebook-square"></i>
                            <span class="nav-label">Facebook Activities </span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="fbplaner"><i class="fa fa-calendar"></i> FB Planner</a></li>
                            <li><a href="fb_activity"><i class="fa fa-plus"></i> Add FB Activity</a></li>
                            <li><a href="view-fb-history"><i class="fa fa-eye"></i> View FB Activity</a></li>
                        </ul>
                    </li>
                    <!-- end fb planner & activity -->
                    <?php endif; ?>

                    <?php
                        if($this->userdata[0]->user_group == 1 || $this->userdata[0]->user_group == 2 ):
                    ?>
                    <!-- sales report -->
                    <li <?php if($current_page == 'sales_report') : ?>class="active" <?php endif; ?>>
                        <a href="#"><i class="fa fa-clipboard"></i> <span class="nav-label">Sales</span></a>
                        <ul class="nav nav-second-level collapse padding-fix" >
                            <li><a href="sales-dashboard"><i class="fa fa-dashboard"></i> Sales Dashboard</a></li>
                            <li><a href="sales-dsr"><i class="fa fa-file"></i> Sales DSR</a>
                            <li><a href="sales-calendar"><i class="fa fa-calendar"></i> Self Calendar</a></li>
                        </ul>
                    </li>
                    <!-- end sales report -->
                    <li <?php if($current_page == 'dataentry') : ?>class="active" <?php endif; ?>>
                        <a href="#"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label"> Data Entry</span></a>
                        <ul class="nav nav-second-level collapse padding-fix" >
                            <li><a href="dataentry"><i class="glyphicon glyphicon-list-alt"></i> Add New</a></li>
                            <li><a href="dataentry_dashboard"><i class="fa fa-check"></i> Dashboard</a></li>
                            <li><a href="dataentrylist"><i class="glyphicon glyphicon-align-center"></i> View Data Entry</a></li>

                             <li><a href="trash-data"><i class="fa fa-trash"></i> View Duplicate Data</a></li>

                        </ul>
                    </li>

                    <li <?php if($current_page == 'telecaller') : ?>class="active" <?php endif; ?>>
                        <a href="#"><i class=" glyphicon glyphicon-phone-alt"></i> <span class="nav-label"> Self Calling</span></a>
                        <ul class="nav nav-second-level collapse" >
                            <?php if($this->userdata[0]->tele_lead ==1) {?>
                            <li><a href="tele-monitoring"><i class="glyphicon glyphicon-scale"></i>Monitoring</a></li>
                            <?php } ?>
                            <li><a href="telecaller"><i class="glyphicon glyphicon-phone-alt"></i> Database</a></li>
                            <li><a href="telecaller-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            <li><a href="fixed_appointment"><i class="fa fa-check-square"></i> Fixed appointment</a></li>
                            <li> <a href="#"><i class="fa fa-calendar"></i> Calendar</a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="telecaller-calendar">Self Calendar</a>
                                    </li>
                                    <li>
                                        <a href="telecaller-team-calendar">Team Calendar</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if($this->userdata[0]->user_group == 1) : ?>

                    <!--Weekly Analysis Report  -->
                    <li <?php if($current_page == 'weekly_analysis_report') : ?>class="active" <?php endif; ?>>
                        <a href="weekly_report"><i class="glyphicon glyphicon-file"></i> <span class="nav-label">Weekly Analysis Report</span></a>
                    </li>
                    <!-- Weekly Analysis Report -->
                    <?php endif; ?>

                     <?php if($this->userdata[0]->user_group == 1 ) : ?>
                    <!--Add target  -->
                     <li <?php if($current_page == 'add_target') : ?>class="active" <?php endif; ?>>
                        <a href="#"><i class=" glyphicon glyphicon-flag"></i> <span class="nav-label"> Target</span></a>
                    <ul class="nav nav-second-level collapse padding-fix" >
                    <li><a href="add_target"><i class="glyphicon glyphicon-flag"></i> Add Target</a></li>
                    <li><a href="incentive_calculate"><i class="glyphicon glyphicon-asterisk"></i> Calculate Incentive</a></li>
                    </ul>
                    </li>
                    <!-- end of add target -->
                    <?php endif; ?>

                    <!--dataentry-->
                    <?php if($this->userdata[0]->user_group == 10): ?>
                    <li <?php if($current_page == 'dataentry') : ?>class="active" <?php endif; ?>>
                        <a href="#"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label"> Data Entry</span></a>
                        <ul class="nav nav-second-level collapse" >
                            <li><a href="dataentry"><i class="glyphicon glyphicon-list-alt"></i> Add New</a></li>
                            <li><a href="dataentrylist"><i class="glyphicon glyphicon-align-center"></i> View Data Entry</a></li>
                        </ul>
                    </li>
                    <!--end of dataentry-->
					<!--selfcalling
					-->
                    <li <?php if($current_page == 'telecaller') : ?>class="active" <?php endif; ?>>
                        <a href="#"><i class=" glyphicon glyphicon-phone-alt"></i> <span class="nav-label"> Self Calling</span></a>
                        <ul class="nav nav-second-level collapse" >
                            <li><a href="telecaller"><i class="glyphicon glyphicon-phone-alt"></i> Database</a></li>
                            <li><a href="telecaller-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
							<li><a href="fixed_appointment"><i class="fa fa-check-square"></i> Fixed appointment</a></li>
                            <li> <a href="#"><i class="fa fa-calendar"></i> Calendar</a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="telecaller-calendar">Self Calendar</a>
                                    </li>
                                    <li>
                                        <a href="telecaller-team-calendar">Team Calendar</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>

                  <!--end of self calling-->

                      <?php if($this->userdata[0]->HRM == 1 || $this->userdata[0]->user_group == 1): ?>
                    <!--HRM-->
                  	<li <?php if($current_page == 'recruitment_management') : ?>class="active" <?php endif; ?>>
                        <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">HRM<label> <?php if($this->userdata[0]->user_group == 1 || $this->userdata[0]->user_role_id == 16 || $this->userdata[0]->team_lead == 1);  ?> </label></span></a>
                        <ul class="nav nav-second-level collapse padding-fix">
                            <li><a href="training_material"><i class="fa fa-book"></i>Training material management</a></li>
                            <li><a href="hr-policy"><i class="fa fa-info-circle"></i> HR policy</a></li>
							<li> <a href="#"><i class="fa fa-male"></i> <span class="nav-label"> Recruitment</span></a>
                            	<ul class="nav nav-third-level">
                                    <li>
                                        <a href="recruitment_management">Data entry</a>
                                    </li>
                                    <li>
                                        <a href="recruitment_view">View recruitment</a>
                                    </li>
                                    <li>
                                        <a href="recruitment_dashboard">Dashboard</a>
                                    </li>
                                </ul>
							</li>
                        </ul>
                    </li>
                    <!-- end HRM -->

                    <?php endif; ?>
                    <?php if($this->userdata[0]->user_group == 8 || $this->userdata[0]->user_group==9): ?>

                    <li <?php if($current_page == 'addposting' || $current_page == 'alladdposting') : ?>class="active" <?php endif; ?>>
                        <a href="#">
                            <i class="fa fa-plus-square"></i>
                            <span class="nav-label">Posting
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <?php if($this->userdata->user_role_id != 1): ?><li <?php if($current_page == 'addposting') : ?>class="active" <?php endif; ?>><a href="addposting"><i class="fa fa-plus"></i> Add New Posting</a></li><?php endif; ?>
                            <li <?php if($current_page == 'alladdposting') : ?>class="active" <?php endif; ?>><a href="alladdposting"><i class="fa fa-check"></i> All Posting</a></li>
                            <li <?php if($current_page == 'alladdposting') : ?>class="active" <?php endif; ?>><a href="posting_dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                        </ul>
                    </li>
                    <li <?php if($current_page == 'leads' || $current_page == 'leads_display') : ?>class="active" <?php endif; ?>>
                        <a href="#">
                            <i class="fa fa-dot-circle-o"></i>
                            <span class="nav-label">Leads
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li <?php if($current_page == 'leads') : ?>class="active" <?php endif; ?>><a href="leads"><i class="fa fa-check"></i> Add New</a></li>
                            <li <?php if($current_page == 'leads_dashboard') : ?>class="active" <?php endif; ?>><a href="leads_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            <li <?php if($current_page == 'leads_display') : ?>class="active" <?php endif; ?>><a href="leads_display"><i class="fa fa-desktop"></i>  View Leads </a></li>
                            <?php if($this->userdata[0]->team_lead ==1) { ?>
                            <li <?php if($current_page == 'leads_allocation') : ?>class="active" <?php endif; ?>><a href="leads_allocation"><i class="fa fa-thumb-tack"></i> Leads Allocation</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li <?php if($current_page == 'leads' || $current_page == 'verification_dashboard' || $current_page == 'leads_followups' || $current_page == 'sent_leads') : ?>class="active" <?php endif; ?>>
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                            <span class="nav-label">verification Report
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li <?php if($current_page == '') : ?>class="active" <?php endif; ?>><a href="leads_tele"><i class="fa fa-check"></i> Leads</a></li>
                            <li <?php if($current_page == '') : ?>class="active" <?php endif; ?>><a href="verification_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            <li <?php if($current_page == '') : ?>class="active" <?php endif; ?>><a href="leads_followups"><i class="fa fa-eye"></i> Follow up</a></li>
                            <li <?php if($current_page == '') : ?>class="active" <?php endif; ?>><a href="sent_leads"><i class="fa fa-cloud-upload"></i> Sent Leads</a></li>

                        </ul>
                    </li>



                   <?php endif; ?>

                    <?php if($this->userdata[0]->team_lead == 1 && $this->userdata[0]->hrm == 0): ?>
                    <!-- training material -->
                    <li <?php if($current_page == 'training_material') : ?>class="active" <?php endif; ?>>
                        <a href="training_material"><i class="fa fa-book"></i> <span class="nav-label">Training material management  </span></a>
                    </li>
                    <?php endif; ?>
                    <!-- end-customer-services -->

                      <!-- team member -->
                     <!--<li <?php if($current_page == 'team_member') : ?>class="active" <?php endif; ?>>
                        <a href="teammember"><i class="fa fa-users"></i> <span class="nav-label">Team member </span></a>
                    </li>-->
                    <?php if($this->userdata[0]->user_role_id == 1 || $this->userdata[0]->user_group == 11 ||$this->userdata[0]->user_group == 3) : ?>

                    <li <?php if($current_page == 'team_member' ) : ?>class="active" <?php endif; ?>>
                        <a href="teammember"><i class="fa fa-users"></i> <span class="nav-label">Team member </span></a>
                    </li>
                    <?php endif; ?>
                    <!-- end-team member -->
                    <!-- Data verification executive -->
                      <?php if($this->userdata[0]->user_role_id ==18): ?>
                       <li <?php if($current_page == 'dataentry') : ?>class="active" <?php endif; ?>>
                        <a href="#"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label"> Data Entry</span></a>
                        <ul class="nav nav-second-level collapse padding-fix" >
                            <li><a href="dataentry"><i class="glyphicon glyphicon-list-alt"></i> Add New</a></li>
                            <li><a href="dataentry_dashboard"><i class="fa fa-check"></i> Dashboard</a></li>
                            <li><a href="dataentrylist"><i class="glyphicon glyphicon-align-center"></i> View Data Entry</a></li>
                             <li><a href="trash-data"><i class="fa fa-trash"></i> View Duplicate Data</a></li>
                        </ul>
                    </li>

                      <?php endif; ?>
                      <!-- end of data verification -->
                    <?php if($this->userdata[0]->hr != 1): ?>
                    <li><a href="hr-policy"><i class="fa fa-info-circle"></i> HR policy</a></li>
                <?php endif; ?>
                <!-- enquiry tracking swapna
				<?php if($_SESSION['user_id'] == 'grank.swapna@gmail.com'): ?>
                    <li <?php if($current_page == 'enquiry-tracking') : ?>class="active" <?php endif; ?>>
                        <a href="enquiry-tracking"><i class="fa fa-gear"></i> <span class="nav-label">Enquiry Tracking </span></a>
                    </li>
					<?php endif; ?>
                    end enquiry tracking swapna  -->
                    <!-- enquiry  menu-->

                    <!-- recruitment  extra-->
                    <?php if($this->userdata[0]->recruitment == 1): ?>
                    <li> <a href="#"><i class="fa fa-male"></i> <span class="nav-label"> Recruitment</span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="recruitment_management">Data entry</a>
                                    </li>
                                    <li>
                                        <a href="recruitment_view">View recruitment</a>
                                    </li>
                                    <li>
                                        <a href="recruitment_dashboard">Dashboard</a>
                                    </li>
                                </ul>
                            </li>
                      <?php endif; ?>
                      <?php if($this->userdata[0]->tele == 1): ?>
                        <li <?php if($current_page == 'dataentry') : ?>class="active" <?php endif; ?>>
                            <a href="#"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label"> Data Entry</span></a>
                            <ul class="nav nav-second-level collapse padding-fix" >
                                <li><a href="dataentry"><i class="glyphicon glyphicon-list-alt"></i> Add New</a></li>
                                <li><a href="dataentry_dashboard"><i class="fa fa-check"></i> Dashboard</a></li>
                                <li><a href="dataentrylist"><i class="glyphicon glyphicon-align-center"></i> View Data Entry</a></li>
                                 <li><a href="trash-data"><i class="fa fa-trash"></i> View Duplicate Data</a></li>
                            </ul>
                        </li>
                      <li <?php if($current_page == 'telecaller') : ?>class="active" <?php endif; ?>>
                        <a href="#"><i class=" glyphicon glyphicon-phone-alt"></i> <span class="nav-label"> Self Calling</span></a>
                        <ul class="nav nav-second-level collapse" >
                            <li><a href="telecaller"><i class="glyphicon glyphicon-phone-alt"></i> Database</a></li>
                            <li><a href="telecaller-dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            <li><a href="fixed_appointment"><i class="fa fa-check-square"></i> Fixed appointment</a></li>
                            <li> <a href="#"><i class="fa fa-calendar"></i> Calendar</a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="telecaller-calendar">Self Calendar</a>
                                    </li>
                                    <li>
                                        <a href="telecaller-team-calendar">Team Calendar</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                     <?php endif; ?>
                       <?php if($this->userdata[0]->customer_service == 1): ?>
                     <li <?php if($current_page == 'customer-details') : ?>class="active" <?php endif; ?>>
                         <a href="customer-details"><i class="fa fa-truck"></i> <span class="nav-label">Customer Services </span></a>
                         <ul class="nav nav-second-level collapse">
                         <li <?php if($current_page == 'customer-details') : ?>class="active" <?php endif; ?>><a href="customer-details"><i class="fa fa-truck"></i> Customer Services</a></li>
                         <li <?php if($current_page == 'customer_service_dashboard') : ?>class="active" <?php endif; ?>><a href="customer_service_dashboard"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                         </ul>
                     </li>
                      <?php endif; ?>
                      <?php if($this->userdata[0]->id == 39 || $this->userdata[0]->id == 52):?>
                        <li <?php if($current_page == 'allocation') : ?>  class="active" <?php endif; ?>>
                            <a href="allocation"><i class="fa fa-share"></i> <span class="nav-label">Allocation </span></a>
                        </li>
                        <?php endif; ?>
                        <?php if($this->userdata[0]->data_entry ==1): ?>
                          <li <?php if($current_page == 'dataentry') : ?>class="active" <?php endif; ?>>
                              <a href="#"><i class="glyphicon glyphicon-list-alt"></i> <span class="nav-label"> Data Entry</span></a>
                              <ul class="nav nav-second-level collapse padding-fix" >
                                  <li><a href="dataentry"><i class="glyphicon glyphicon-list-alt"></i> Add New</a></li>
                                  <li><a href="dataentry_dashboard"><i class="fa fa-check"></i> Dashboard</a></li>
                                  <li><a href="dataentrylist"><i class="glyphicon glyphicon-align-center"></i> View Data Entry</a></li>

                                   <li><a href="trash-data"><i class="fa fa-trash"></i> View Duplicate Data</a></li>

                              </ul>
                          </li>
                        <?php endif; ?>
                </ul>
            </div>
        </nav>

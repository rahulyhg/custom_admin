                <?php
                    //include_once "includes/copyright.php";
                    //include_once "includes/chat.php";
                    //include_once "includes/sidebar-right.php";
                ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="<?php base_url(); ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- nicescroll -->
    <!--<script src="js/jquery.nicescroll.min.js"></script>
    <script>
      $(document).ready(function() {
        var nicesx = $("body").niceScroll({touchbehavior:false,cursorcolor:"#ccc",cursoropacitymax:0.6,cursorwidth:8});
      });
    </script>-->


    <!-- Flot -->
    <script src="<?php base_url(); ?>assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php base_url(); ?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php base_url(); ?>assets/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php base_url(); ?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php base_url(); ?>assets/js/plugins/flot/jquery.flot.pie.js"></script>
    <!-- Peity -->
    <script src="<?php base_url(); ?>assets/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php base_url(); ?>assets/js/demo/peity-demo.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="<?php base_url(); ?>assets/js/inspinia.js"></script>
    <script src="<?php base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>
    <!-- jQuery UI -->
    <script src="<?php base_url(); ?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- GITTER -->
    <script src="<?php base_url(); ?>assets/js/plugins/gritter/jquery.gritter.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php base_url(); ?>assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- Sparkline demo data  -->
    <script src="<?php base_url(); ?>assets/js/demo/sparkline-demo.js"></script>
    <!-- ChartJS-->
    <script src="<?php base_url(); ?>assets/js/plugins/chartJs/Chart.min.js"></script>
    <!-- Toastr -->
    <script src="<?php base_url(); ?>assets/js/plugins/toastr/toastr.min.js"></script>
    <script src="<?php base_url(); ?>assets/js/bootstrap-select.js"></script>

    <script src="<?php base_url(); ?>assets/js/moment.min.js"></script>
    <script src="<?php base_url(); ?>assets/js/fullcalendar.min.js"></script>
    <!-- <script src="//code.jquery.com/jquery.min.js"></script> -->
    <script src="<?php base_url(); ?>assets/js/timingfield.js"></script>


    <!--<script src="js/jquery.cropit.js"></script>-->

    <script type="text/javascript" src="<?php base_url(); ?>assets/js/widgEditor.js"></script>

    <!-- Bootstrat Datatable -->
    <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>

    <!-- bootstrap datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.1/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script src="<?php base_url(); ?>assets/js/plugins/iCheck/icheck.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
     <!--tooltip-->
       <script type="text/javascript" src="<?php base_url(); ?>assets/js/tipped.js"></script>
       <link rel="stylesheet" type="text/css" href="<?php base_url(); ?>assets/css/tipped.css"/>
    <script>
        $(document).ready(function(){
        	$('#datatable').DataTable( {
                "drawCallback": function( settings ) {
                    $('.selectpicker').selectpicker('refresh');
                },
    			select: true
            });

            $('.datatable').DataTable( {
                select: true,
                lengthMenu: [5,10,25,50,100]
            });


		//check all
        $("#check-all").click(function () {
           	//alert('True');
            if ($("#check-all").is(':checked')) {
                $("input[type=checkbox]").each(function () {
                    $(this).prop("checked", true);
                });
                $('.icheckbox_square-green').each(function(){
                    $(this).addClass('checked');
                });
            } else {
                $("#data-list input[type=checkbox]").each(function () {
                    $(this).prop("checked", false);
                });
                $('.icheckbox_square-green').each(function(){
                    $(this).removeClass('checked');
                });
            }
        });

            // $('#daterange').daterangepicker({
            //     locale:{
            //         format:'YYYY-MM-DD'
            //     }
            // });
            // $('input[name="daterange"]').daterangepicker({
            //     locale: {
            //         format: 'YYYY-MM-DD'
            //     },
            //     startDate: '<?php echo date("Y-m-d"); ?>',
            //     endDate: '<?php echo date("Y-m-d", strtotime("+30 days")); ?>'
            // });
        $('input[name="daterange"]').daterangepicker(
        {
            locale: {
            format: 'YYYY-MM-DD'
            }
        });
        });
    </script>

        <script type="text/javascript">
		 $(document).ready(function() {
		   Tipped.create('.simple-tooltip');
		 });
	   </script>

    <script>
    $(document).ready(function() {
    	$('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        // $('.checklist .checkbox').on('click', function(){
        //     $('.checklist i').wrap('<strike>');
        // });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $('#add-new').on('click', function(){
            $('#new-row').append('<label class="col-sm-2 control-label"></label><div class="col-sm-3"><label>Category</label><select class="show-tick form-control" id="server-type" data-live-search="true" name="package_category[]"><option>Select</option><option value="Adwords Keyword">Adwords Keyword</option><option value="Adwords Landing Page">Adwords Landing Page</option><option value="Google Remarketing">Google Remarketing</option><option value="Google Ad Banners">Google Ad Banners</option><option value="Gmail Ads">Gmail Ads</option><option value="Website Redesigning">Website Redesigning</option><option value="New Website">New Website</option><option value="SEO Project">SEO Project</option><option value="YouTube Promotion">YouTube Promotion</option><option value="Local Listing">Local Listing</option><option value="FB Account Setup">FB Account Setup</option><option value="FB Postings">FB Postings</option><option value="FB remarketing">FB Remarketing</option><option value="Facebook Ads">Facebook Ads</option><option value="LinkedIn Account Setup">LinkedIn Account Setup</option><option value="Linkedin Postings">Linkedin Postings</option><option value="Linkedin remarketing">Linkedin remarketing</option><option value="Linkedin Ads">Linkedin Ads</option><option value="Video Spokesperson">Video Spokesperson</option><option value="Multilingual">Multilingual</option><option value="Online Chat">Online Chat</option><option value="Verified Enquiries">Verified Enquiries</option></select></div><div class="col-sm-3"><label>Description</label><input type="text" name="package_description[]" class="form-control" placeholder="Description" /></div><div class="col-sm-3"><label>Duration</label><select class="show-tick form-control" id="package-duration" data-live-search="true" name="package_duration[]"><option>Select</option><option value="1">1 Month</option><option value="2">2 Months</option><option value="3">3 Months</option><option value="4">4 Months</option><option value="5">5 Months</option><option value="6">6 Months</option><option value="7">7 Months</option><option value="8">8 Months</option><option value="9">9 Months</option><option value="10">10 Months</option><option value="11">11 Months</option><option value="12">12 Months</option></select></div><div class="clearfix"></div>');
            jQuery.getScript('js/bootstrap-select.js');
        });

        //$("#txtEditor").Editor();
        //$('#wysiwyg').wysiwyg();

        $( ".datepicker" ).datepicker({ format: 'yyyy-mm-dd', autoclose: true, todayHighlight: true });

        $('.datetimepicker').datetimepicker({
                defaultDate: "",
                format: 'YYYY-MM-DD HH:mm:ss'
            });
        });

        $(function(){

            $('#tags input').on('focusout',function(){
                var txt= this.value.replace(/[^a-zA-Z0-9\+\-\.\# ]/g,''); // allowed characters
                //var txt = $(this).val();
                if(txt) {
                    $(this).before('<span class="tag">'+ txt +'<input type="hidden" name="package_items[]" value="'+txt+'" /></span>');
                }
                this.value="";
            }).on('keyup',function( e ){
                // if: comma,enter (delimit more keyCodes with | pipe)
                e.preventDefault();
                if(/(188|13)/.test(e.which)) $(this).focusout();
            });
            $('#tags').on('click','.tag',function(){
                $(this).remove();
            });
        });

        <?php if($current_page != 'editprojects'): ?>
        $('#cheque-number').hide();

         $('#online_bank').hide();

        $('.ftp-details').hide();

        $('.cpanel-details').hide();

        $('#post-cheque').hide();

        <?php endif; ?>

        $('#payment-mode').on('change', function(){
            if($('#payment-mode').val() == 'Cheque'){
                $('#cheque-number').show();
                $('#post-cheque').show();
            }
            else{

                $('#cheque-number').hide();
                $('#post-cheque').hide();
            }
        });

         $('#payment-mode').on('change', function(){
            if($('#payment-mode').val() == 'Online' ){
                $('#online_bank').show();

            }
            else{
                $('#online_bank').hide();
            }
        });

        $('#server-type').on('change', function(){
            if( $('#server-type').val() == 'FTP' ){
                $('.ftp-details').show();
                $('.cpanel-details').hide();
            }
            else if( $(this).val() == 'Cpanel' ){
                $('.cpanel-details').show();
                $('.ftp-details').hide();
            }
            else{
                $('.ftp-details').hide();
                $('.cpanel-details').hide();
            }
        });

        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            //toastr.success('CRM', 'Welcome to G-Rank');

        }, 1300);


        $('#change-status').modal({ show: false});

        function dynamic_modal_project_status(id, task_id, user_id){
            $.ajax({
                type: "POST",
                url: "functions/dynamic_modal.php",
                data: {project_id: id, task_id: task_id, user_id: user_id},
                success: function(data){

                    //"data" contains a json with your info in it, representing the array you created in PHP. Use $(".modal-content").html() or something like that to put the content into the modal dynamically using jquery.
                    $('.change-statu').html(data);
                    $('#change-status').show();// this triggers your modal to display
                },

            });
        }

        // leads update Telecaller
        $('#budget_leads').hide();
        $('#date_leads').hide();
        $('#feedback_leads').hide();
        $('#plan_to_buy_leads').hide();
        $('#main_location_leads').hide();
        $('#suggested_location_leads').hide();
        $('#enquiry_sent_leads').hide();
        $('#issue_leads').hide();
        $('#verification_leads').hide();
        $('#location').hide();
        $('.milestone_feedback').hide();

        $('.project-status').on('change',function(){
          if($('.project-status').val() == 'On hold') {

              $('.milestone_feedback').show();

                    }
          else
          {

              $('.milestone_feedback').hide();
          }
        });
        $('#project-status').on('change',function(){
          if($('#project-status').val() == 'On hold') {

              $('.milestone_feedback').show();

                    }
          else
          {

              $('.milestone_feedback').hide();
          }
        });


        // condition for leads update tele accoridng to dropdowns
        $('#call_status').on('change',function(){
            if($('#call_status').val()=='Sent leads'){
        $('#budget_leads').show();
        $('#location').show();
        $('#feedback_leads').show();
        $('#plan_to_buy_leads').show();
        $('#main_location_leads').show();
        $('#suggested_location_leads').show();
        $('#enquiry_sent_leads').show();
        $('#issue_leads').show();
        $('#verification_leads').show();

            }


            else if($('#call_status').val()=='Not interested' || $('#call_status').val()=='Finalised other project'){
        $('#budget_leads').hide();
        $('#date_leads').hide();
        $('#feedback_leads').show();
        $('#plan_to_buy_leads').hide();
        $('#main_location_leads').hide();
        $('#suggested_location_leads').hide();
        $('#enquiry_sent_leads').hide();
        $('#issue_leads').hide();
        $('#verification_leads').hide();

            }


            else if($('#call_status').val()=='Follow Up'){
        $('#budget_leads').hide();
        $('#date_leads').show();
        $('#feedback_leads').show();
        $('#plan_to_buy_leads').hide();
        $('#main_location_leads').hide();
        $('#suggested_location_leads').hide();
        $('#enquiry_sent_leads').hide();
        $('#issue_leads').hide();
        $('#verification_leads').hide();
        $('#location').hide();

            }
        });


        //Update Telecaller Page Script
        $('#other_designation').hide();
        $('#appointment-group').hide();
        $('#follow-up-group').hide();
        $('#status-group').hide();
        $('#status-ineffective').hide();
        //otherdata type
        $('#other_datatype').hide();

        //customer support
        $('#status_cs').hide();
        $('#allocate_customer_support').hide();
        $('#appointment_datetime_cs').hide();
        $('#follow_cs').hide();
        $('#problem_customer_support').hide();
        $('#problem_submitted_cs').hide();
        $('#problem_solved_cs').hide();
        $('#clent_satisfaction_cs').hide();
        $('#references_cs').hide();
        $('#testimonial_cs').hide();
        $('#server_status_cs').hide();
        $('#ad_performance_cs').hide();

        $('#productivity_cs').on('change',function(){
          if($('#productivity_cs').val() == 'Effective') {

              $('#status_cs').show();

                    }
          else
          {

              $('#status_cs').hide();
          }
        });
        $('#productivity_cs').on('change',function(){
          if($('#productivity_cs').val() == 'Ineffective') {

              $('#follow_cs').show();

                    }
          else
          {
            $('#other_datatype').show();
              $('#follow_cs').hide();
          }
        });

        $('#status_customer_support').on('change',function(){
          if($('#status_customer_support').val() == 'Service Call') {

            $('#problem_customer_support').show();
            $('#problem_submitted_cs').show();
            $('#problem_solved_cs').show();
            $('#testimonial_cs').show();
            $('#server_status_cs').show();
            $('#ad_performance_cs').show();
              $('#follow_cs').show();

                    }
          else
          {
            $('#problem_customer_support').hide();
            $('#problem_submitted_cs').hide();
            $('#problem_solved_cs').hide();
            $('#testimonial_cs').hide();
            $('#server_status_cs').hide();
            $('#ad_performance_cs').hide();
              $('#follow_cs').hide();
          }
        });
        $('#status_customer_support').on('change',function(){
          if($('#status_customer_support').val() == 'Appointment Fixed') {

            $('#allocate_customer_support').show();
            $('#appointment_datetime_cs').show();

                    }
          else
          {
            $('#allocate_customer_support').hide();
            $('#appointment_datetime_cs').hide();
          }
        });


        //other datatype
		$('#datatype').on('change',function(){
			if($('#datatype').val() == 'Others') {
				$('#other_datatype').show();
                }
			else
			{
				$('#other_datatype').hide();
			}
		});

        $('#productivity').on('change',function(){
            if( $('#productivity').val() == 'Effective'){
                $('#status-group').show();
                $('#follow-up-group').hide();
                $('#status-ineffective').hide();
            }
            else if($('#productivity').val()=='Ineffective'){
                $('#status-group').hide();
                $('#follow-up-group').show();
                $('#appointment-group').hide();
                $('#status-ineffective').show();
            }
        });

        //dataentry(other designation)
        $('#designation').on('change',function(){
        	if($('#designation').val()=='Other'){
        		$('#other_designation').show();
        	}
        	else{
        		$('#other_designation').hide();
        	}
        });

        $('#status').on('change',function(){
            if( $('#status').val() == 'Appointment Fixed'){
                $('#appointment-group').show();
                $('#follow-up-group').hide();
            }
            else if($('#status').val()=='Follow Up'){
                //$('#status-group').hide();
                $('#follow-up-group').show();
                $('#appointment-group').hide();
            }
            else if($('#status').val()=='Not Interested'){
                $('#follow-up-group').hide();
                $('#appointment-group').hide();
            }
            else if($('#status').val()=='Prospect'){
                $('#follow-up-group').hide();
                $('#appointment-group').show();
            }
        });



        $(function() {

    function cb(start, end) {
        $('#reportrange').val(start.format('YYYY-MM-DD ') + ' - ' + end.format('YYYY-MM-DD '));
    }
    cb(moment().subtract(29, 'days'), moment());

    $('#reportrange').daterangepicker({
        locale:{
            format: 'YYYY-MM-DD'
        },
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

});

        //Bootstrap Search Table
        //$('#datatable').DataTable();
    </script>

    <!-- add scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.2.1/jquery-migrate.min.js"></script>

    <!-- arrowchat -->
    <script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
    <script type="text/javascript" src="/arrowchat/external.php?type=js" charset="utf-8"></script>
    <!-- end arrowchat -->

    <!-- desktop notification -->
    <script src="js/desktop-notification.php"></script>
    <script>

        $.ajax({
            url : 'functions/get-notification-unallocated',
            type: 'POST',
            data: {userid: '<?php echo $_SESSION['user_id']; ?>', type: 'Follow Up'},
            success : function(data){
                //showDesktopNotification(data[0], data[1]);
                if(data != null){
                    showDesktopNotification(data[0], data[1], data[2]);
                    //data;
                    console.log(data);
                }
            },
            dataType:"json"
            //success : showResponse
        });

        $.ajax({
            url : 'functions/get-notification',
            type: 'POST',
            data: {userid: '<?php echo $_SESSION['user_id']; ?>', type: 'Follow Up'},
            success : function(data){
                //showDesktopNotification(data[0], data[1]);
                if(data != null){
                    showDesktopNotification(data[0], data[1], data[2]);
                    //data;
                    console.log(data);
                }
            },
            dataType:"json"
            //success : showResponse
        });

        //showDesktopNotification('Test', 'Test Message');

        // timefeild


        //$(".timing").timingfield();

              $(".timing").timingfield({
        maxHour:        23,
        width:          400,
        hoursText:      'Hr',
        minutesText:    'Min',
        secondsText:    'Sec'
        });

    </script>

</body>

</html>

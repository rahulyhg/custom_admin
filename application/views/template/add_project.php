    <div id="page-wrapper" class="gray-bg">        
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add New Project</small></h5>
                        </div>
                        <div class="ibox-content">
                            <form method="POST" class="form-horizontal" action="functions/addproject">
                            <?php echo form_open('gp1/') ?>
                                <div class="form-group"><label class="col-sm-2 control-label">Company Name</label>
                                    <div class="col-sm-10">
                                        <select class="selectpicker show-tick form-control allcaps" data-live-search="true" name="client_id" required>
                                            <option value="">Select Company</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Project Name / Product Name</label>
                                    <div class="col-sm-10">
                                        <!-- <textarea class="widgEditor form-control" name="project_title" placeholder="Project Name / Product Name" required></textarea> -->
                                       <?php  $data =array(
                                        'name'=>'project_title',
                                        'class' => 'widgEditor form-control',
                                        'placeholder'=>'Project Name / Product Name');

                                       echo form_textarea($data);


                                        ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Project Duration</label>
                                    <div class="col-sm-10"><!-- <input type="text" class="form-control" name="project_duration" placeholder="Project Duration" required> -->
                                        <?php 
                                        $data = array( 
                                        'class' => 'form-control',
                                        'name' => 'project_duration',
                                        'placeholder'=>'Project Duration');
                                        echo form_input($data); ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Project Description <i class="fa fa-question bg-fill" data-toggle="popover" data-placement="top" data-html="true" data-content="B2B : Line of Business, Manufacturer, Trader, Supplier, Exporter - Country / City <br><br> B2C : Kind of Project, Area, Location, Cost of Project, Competitors"></i></label>
                                    <div class="col-sm-10"><!-- <textarea name="project_description" class="widgEditor form-control" placeholder="Project Description"></textarea> -->
                                        <?php 
                                        $data =array(
                                        'class'=>'widgEditor form-control',
                                        'placeholder'=> 'Project Description',
                                        'name'=>'project_description'); 
                                        echo form_textarea($data); ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-lg-2 control-label">Website URL</label>

                                    <div class="col-lg-10"><!-- <input type="text" placeholder="Website URL" name="website_url" class="form-control"> -->
                                        <?php 
                                        $data =array(
                                        'placeholder'=>'Website URL',
                                        'name'=>'website_url',
                                        'class'=>'form-control');
                                        echo form_input($data); ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-lg-2 control-label">Server Details</label>
                                    <div class="col-lg-10">
                                       <!--  <select class="selectpicker show-tick form-control" id="server-type" data-live-search="true" name="server_type">
                                            <option>Select</option>
                                            <option value="FTP">FTP</option>
                                            <option value="Cpanel">CPANEL</option>
                                        </select> -->
                                        <?php $options= array(
                                        ''=>'Select',
                                        'FTP'=>'FTP',
                                        'Cpanel'=>'Cpanel');
                                        echo form_dropdown('server_type',$options,'','id="server-type" data-live-search="true"  class="selectpicker show-tick form-control"'); ?>
                                    </div>
                                </div>
                                <div class="ftp-details">
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">FTP Host</label>
                                        <div class="col-sm-10">
                                           <!--  <input type="text" class="form-control" id="ftp_host" name="ftp_host" autocomplete="off"> -->
                                           <?php $data = array(
                                           'class'=>'form-control',
                                           'id'=>'ftp_host',
                                           'name' => 'ftp_host',
                                           'autocomplete' => 'off');
                                           echo form_input($data); ?>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">FTP Username</label>
                                        <div class="col-sm-10">
                                           <!--  <input type="text" name="ftp_username" class="form-control" /> -->
                                           <?php 
                                           $data = array(
                                           'name'=>'ftp_username',
                                           'class'=>'form-control');
                                           echo form_input($data); ?>

                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">FTP Password</label>
                                        <div class="col-sm-10">
                                            <!-- <input type="text" name="ftp_password" class="form-control" /> -->
                                            <?php 
                                            $data = array(
                                            'name'=>'ftp_password',
                                            'class'=>'form-control');
                                            echo form_input($data); ?>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">FTP Encryption</label>
                                        <div class="col-sm-10">
                                            <!-- <input type="text" name="ftp_encryption" class="form-control" /> -->
                                            <?php 
                                            $data = array(
                                            'name'=>'ftp_encryption',
                                            'class'=>'form-control'
                                            );
                                            echo form_input($data);  ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="cpanel-details">
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Cpanel URL</label>
                                        <div class="col-sm-10">
                                            <!-- <input type="text" name="cpanel_url" class="form-control" /> -->
                                            <?php 
                                            $data = array(
                                            'name'=>'cpanel_url',
                                            'class'=>'form-control'
                                            );
                                            echo form_input($data);?>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">CPanel Username</label>
                                        <div class="col-sm-10">
                                            <!-- <input type="text" name="cpanel_username" class="form-control" /> -->
                                            <?php 
                                            $data = array(
                                            'name'=>'cpanel_username',
                                            'class'=>'form-control'
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">CPanel Password</label>
                                        <div class="col-sm-10">
                                        <!-- <input type="text" name="cpanel_password" class="form-control" /> -->
                                        <?php 
                                        $data = array(
                                        'name'=>'cpanel_password',
                                        'class' => 'form-control');
                                        echo form_input($data);
                                        ?>
                                    </div>
                                </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Email (Webmail) for enquiry </label>
                                    <div class="col-sm-10">
                                        <!-- <input type="text" class="form-control" name="webmail" placeholder="Email" /> -->
                                        <?php 
                                        $data = array(
                                        'class' => 'form-control',
                                        'name' =>'webmail',
                                        'placeholder' =>'Email');
                                        echo form_input($data); ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Package Type</label>
                                    <div class="col-sm-10">
                                       <!--  <select class="selectpicker show-tick form-control" id="package-type" data-live-search="true" name="package_type" required>
                                            <option value="">Select</option>
                                            <option value="B2B">B2B</option>
                                            <option value="B2C">B2C</option>
                                        </select> -->
                                        <?php $options= array(
                                        ''=>'Select',
                                        'B2B'=>'B2B',
                                        'B2C'=>'B2C');
                                        echo form_dropdown('package_type',$options,'','class="selectpicker show-tick form-control" id="package-type" data-live-search="true" '); ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Package Name</label>
                                    <div class="col-sm-10">
                                       <!--  <input type="text" name="package_name" class="form-control" placeholder="Package Name" /> -->
                                       <?php
                                       $data =array(
                                       'name' =>'package_name',
                                       'class'=>'form-control',
                                       'placeholder'=>'Package Name'); 
                                       echo form_input($data);?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Package Details</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">

                                    </label>
                                    <div class="col-sm-3">
                                        <label>Category</label>
                                        <!-- <select class="selectpicker show-tick form-control" id="server-type" data-live-search="true" name="package_category[]">
                                            <option>Select</option>
                                            <option value="Adwords Keyword">Adwords Keyword</option>
                                            <option value="Adwords Landing Page">Adwords Landing Page</option>
                                            <option value="Google Remarketing">Google Remarketing</option>
                                            <option value="Google Ad Banners">Google Ad Banners</option>
                                            <option value="Gmail Ads">Gmail Ads</option>
                                            <option value="Website Redesigning">Website Redesigning</option>
                                            <option value="New Website">New Website</option>
                                            <option value="SEO Project">SEO Project</option>
                                            <option value="YouTube Promotion">YouTube Promotion</option>
                                            <option value="Local Listing">Local Listing</option>
                                            <option value="Verified Enquiries">Verified Enquiries</option>
                                            <option value="FB Account Setup">FB Account Setup</option>
                                            <option value="FB Postings">FB Postings</option>
                                            <option value="FB remarketing">FB Remarketing</option>
                                            <option value="Facebook Ads">Facebook Ads</option>
                                            <option value="Linkedin Account Setup">Linkedin Account Setup</option>
                                            <option value="Linkedin Postings">Linkedin Postings</option>
                                            <option value="Linkedin remarketing">Linkedin remarketing</option>
                                            <option value="Linkedin Ads">Linkedin Ads</option>
                                            <option value="Video Spokesperson">Video Spokesperson</option>
                                            <option value="Multilingual">Multilingual</option>
                                            <option value="Online Chat">Online Chat</option>
                                        </select> -->
                                        <?php $options=array(
                                        ''=>'Select',
                                        'Adwords Keyword'=>'Adwords Keyword',
                                        'Adwords Landing Page'=>'Adwords Landing Page',
                                        'Google Remarketing'=>'Google Remarketing',
                                        'Google Ad Banners'=>'Google Ad Banners',
                                        'Gmail Ads'=>'Gmail Ads',
                                        'Website Redesigning'=>'Website Redesigning',
                                        'New Website'=>'New Website',
                                        'SEO Project'=>'SEO Project',
                                        'YouTube Promotion'=>'YouTube Promotion',
                                        'Local Listing'=>'Local Listing',
                                        'Verified Enquiries'=>'Verified Enquiries',
                                        'FB Account Setup'=>'FB Account Setup',
                                        'FB Postings'=>'FB Postings',
                                        'FB remarketing'=>'FB remarketing',
                                        'Facebook Ads'=>'Facebook Ads',
                                        'Linkedin Account Setup'=>'Linkedin Account Setup',
                                        'Linkedin Postings'=>'Linkedin Postings',
                                        'Linkedin remarketing'=>'Linkedin remarketing',
                                        'Linkedin Ads'=>'Linkedin Ads',
                                        'Video Spokesperson'=>'Video Spokesperson',
                                        'Multilingual'=>'Multilingual',
                                        'Online Chat'=>'Online Chat'
                                        ); 
                                        echo form_dropdown('package_category[]',$options,'','class="selectpicker show-tick form-control" id="server-type" data-live-search="true"');?>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Description</label>
                                        <!-- <input type="text" name="package_description[]" class="form-control" placeholder="Description" /> -->
                                        <?php
                                        $data =array (
                                            'name'=>'package_description[]',
                                            'class'=>'form-control',
                                            'placeholder'=>'Description');
                                        echo form_input($data);
                                        ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Duration</label>
                                       <!--  <select class="selectpicker show-tick form-control" id="package-duration" data-live-search="true" name="package_duration[]">
                                            <option>Select</option>
                                            <option value="1">1 Month</option>
                                            <option value="2">2 Months</option>
                                            <option value="3">3 Months</option>
                                            <option value="4">4 Months</option>
                                            <option value="5">5 Months</option>
                                            <option value="6">6 Months</option>
                                            <option value="7">7 Months</option>
                                            <option value="8">8 Months</option>
                                            <option value="9">9 Months</option>
                                            <option value="10">10 Months</option>
                                            <option value="11">11 Months</option>
                                            <option value="12">12 Months</option>
                                        </select> -->
                                        <?php $options = array(
                                        ''=>'Select',
                                        '1'=>'1 Month',
                                        '2'=>'2 Months',
                                        '3'=>'3 Months',
                                        '4'=>'4 Months',
                                        '5'=>'5 Months',
                                        '6'=>'6 Months',
                                        '7'=>'7 Months',
                                        '8'=>'8 Months',
                                        '9'=>'9 Months',
                                        '10'=>'10 Months',
                                        '11'=>'11 Months',
                                        '12'=>'12 Months'
                                        );
                                        echo form_dropdown('package_duration[]',$options,'','class="selectpicker show-tick form-control" id="package-duration" data-live-search="true"'); ?>
                                    </div>
                                </div>
                                <div id="new-row">
                                    
                                </div>
                                <a href="javascript:void(0);" id="add-new" class="btn btn-success pull-right  simple-tooltip" title="Add more package  details"><i class="fa fa-plus"></i> Add</a>
                                <div class="clearfix"></div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Contract Amount</label>
                                    <div class="col-sm-10">
                                       <!--  <input type="text" id="contract" class="form-control" name="contract_amount" placeholder="Contract Amount" onchange="calculateTotal();" > -->
                                       <?php
                                       $data =array(
                                        'id'=>'contract',
                                        'class'=>'form-control',
                                        'name'=>'contract_amount',
                                        'placeholder'=>'Contract Amount',
                                        'onchange'=>'calculateTotal();');
                                       echo form_input($data);
                                       ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Service Tax</label>
                                    <div class="col-sm-10"><!-- <input type="text" class="form-control" id="tax" name="service_tax" placeholder="Service Tax" value="15" readonly > -->
                                        <?php 
                                        $data =array(
                                        'class'=>'form-control',
                                        'id' =>'tax',
                                        'name'=>'service_tax',
                                        'placeholder' =>'Service Tax',
                                        'value'=>'15');
                                        echo form_input($data); ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">TDS Amount</label>
                                    <div class="col-sm-10"><!-- <input type="text" class="form-control" id="tds" name="tds" value="0" placeholder="TDS"  onchange="calculateTotal()" /> -->
                                        <?php 
                                        $data = array(
                                        'class'=>'form-control',
                                        'id'=>'tds',
                                        'name'=>'tds',
                                        'value'=>'0',
                                        'placeholder'=>'TDS',
                                        'onchange'=>'calculateTotal()');
                                        echo form_input($data); ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Total Sale Amount</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="total-sale-amount" name="total_sale_amount" placeholder="Total Sale amount" readonly="" /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Payment Method</label>
                                    <div class="col-sm-10">
                                        <select class="selectpicker show-tick form-control" id="payment-mode" data-live-search="true" name="payment_mode">
                                            <option value="" required>Select</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Online">Online</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="online_bank">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Bank</label>
                                    <div class="col-sm-10">
                                        <select class="selectpicker show-tick form-control"  data-live-search="true" name="online_bank">
                                            <option value="">Select</option>
                                            <option value="HDFC">HDFC</option>
                                            <option value="ICICI">ICICI</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <div id="cheque-number">
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Cheque Number</label>
                                        <div class="col-sm-10">
                                           <!--  <input type="text" class="form-control" name="cheque_number" placeholder="Cheque Number" /> -->
                                           <?php 
                                           $data = array(
                                           'class'=>'form-control',
                                           'name'=>'cheque_number',
                                           'placeholder'=>'Cheque Number');
                                           echo form_input($data); ?>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Cheque Date</label>
                                        <div class="col-sm-10">
                                           <!--  <input type="text" class="datepicker form-control" name="cheque_date" placeholder="Cheque Date" /> -->
                                            <?php 
                                           $data = array(
                                           'class'=>'datepicker form-control',
                                           'name'=>'cheque_date',
                                           'placeholder'=>'Cheque Date');
                                           echo form_input($data); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Total Collected amount</label>
                                    <div class="col-sm-10">
                                        <!-- <input type="text" class="form-control" name="total_amount_paid" id="total-amount" placeholder="Total collected Amount" value="" onchange="calculateBalance();" /> -->
                                         <?php 
                                           $data = array(
                                           'class'=>'form-control',
                                           'name'=>'total_amount_paid',
                                           'id'=>'total-amount',
                                           'placeholder'=>'Total collected Amount',
                                           'onchange'=>'calculateBalance();');
                                           echo form_input($data); ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Balance Amount</label>
                                    <div class="col-sm-10">
                                        <!-- <input type="text" class="form-control" name="balance_amount" id="balance-amount" placeholder="Balance Amount" readonly="" /> -->
                                        <?php  $data = array(
                                           'class'=>'form-control',
                                           'name'=>'balance_amount',
                                           'id'=>'balance-amount',
                                           'placeholder'=>'Balance Amount',
                                           'onchange'=>'calculateBalance();',
                                           'readonly'=>'true');
                                           echo form_input($data); ?>
                                    </div>
                                </div>
                                <div id="post-cheque">
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Post Dated Cheque Number</label>
                                        <div class="col-sm-10">
                                            <!-- <input type="text" class="form-control" name="pdc_number" id="post-cheque-number" placeholder="Post dated Cheque Number" /> -->
                                            <?php $data = array(
                                           'class'=>'form-control',
                                           'name'=>'pdc_number',
                                           'id'=>'post-cheque-number',
                                           'placeholder'=>'Post dated Cheque Number'
                                           );
                                           echo form_input($data); ?>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Post Dated Cheque Date</label>
                                        <div class="col-sm-10">
                                           <!--  <input type="text" class="form-control datepicker" name="pdc_date" id="post-cheque-date" placeholder="Post dated Cheque Date" /> -->
                                           <?php 
                                            $data = array(
                                            'class'=>'form-control datepicker',
                                            'name'=>'pdc_date',
                                            'id'=>'post-cheque-date',
                                            'placeholder'=>'Post dated Cheque Date');
                                            echo form_input($data);
                                           ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Sales Executive</label>
                                    <div class="col-sm-10">
                                        <select class="selectpicker show-tick form-control" data-live-search="true" name="sales_executive">
                                            <option value="">Select</option>
                                           
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary  simple-tooltip" title="Submit the form" type="submit">Add</button>
                                    </div>
                                </div>
                           <!--  </form> -->
                           <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
              function get_total_sale_amount(){
                var contract = $('#contract').val();
                var tax = $('#tax').val();
                var tds = $('#tds').val();
                
                var tax_amt = ( contract * 100 ) / 115;
                var tax_sum = contract - tax_amt;
                var sum = contract - tax_sum - tds;
                //var sum = Math.round(sum * 2) / 2;
                sum = Math.round(sum);
                return sum;
              }

              function get_tds_total(){
                var contract = $('#contract').val();
                var tax = $('#tax').val();
                var tds = $('#tds').val();
                var tax_sum = contract - tax_amt;
                var total = contract - tax_sum;
                var tds_amt = total - tds;
                return tds_amt;
              }

              function calculateTotal(){
                var total = get_total_sale_amount();
                $('#total-sale-amount').val(total);
              }

              function calculateTDS(){
                var tds_total = get_tds_total();
                $('#total-sale-amount').val(tds_total);
              }

              function get_balance_amount(){
                var contract_amount = $('#contract').val();
                var amount_paid = $('#total-amount').val();
                var tds = $('#tds').val();
                var balance_sum = contract_amount - amount_paid - tds;
                return balance_sum;
              }

              function calculateBalance(){
                var balance = get_balance_amount();
                $('#balance-amount').val(balance);
              }

              function select_package()
              {
                var selected_package = $('#package-type').val();
                $.post('[conf.site_url]/admin/projects/package_pulldown/',
                {
                    selected_package : selected_package
                },
                function(data) 
                {
                  $('#package-name').html(data);
                }); 
              }

            </script>

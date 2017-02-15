<?php 
    $current_page = 'edit dataentry'; 
    $id = $_GET['id'];
?>
<?php include_once "includes/header.php"; ?>
    <div id="page-wrapper" class="gray-bg">
        <?php include_once "includes/top-menu.php"; ?>
        <br>
        <!-- <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-12">
                <h2 class="pull-left">Add Project</h2>
            </div>
        </div> -->
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Data entry</small></h5>
                        </div>
                        <div class="ibox-content">
                            <form method="POST" class="form-horizontal" action="functions/update_dataentry">
                                <?php 
                                    $query = get_query('*', 'dataentry', " id = '$id' ");
                                    $data = mysqli_fetch_array($query, MYSQLI_NUM);
                                ?>
                                <input type="hidden" class="form-control" id="userid" name="userid" value="<?php echo $_SESSION['user_id']; ?>" />
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>" />


                                
                                
                                <div class="form-group"><label class="col-lg-2 control-label">Segment</label>
                                    <div class="col-lg-10">
                                        <select value="<?php echo $_GET['segment']; ?>" class="selectpicker show-tick form-control" id="segment" data-live-search="true" name="segment" required>
                                            <option><?php echo $data[2]; ?></option>
                                            <option value="B2B">B2B</option>
                                            <option value="B2C">B2C</option>
                                        </select>
                                    </div>
                                </div>                               
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-lg-2 control-label">Data type</label>
                                    <div class="col-lg-10">
                                        <select class="selectpicker show-tick form-control" id="datatype" data-live-search="true" name="datatype" required>
                                            <option><?php echo $data[4]; ?></option>
                                            <option value="Alibaba">Alibaba</option>
                                            <option value="99Acres">99Acres</option>
                                            <option value="Magicbricks">Magicbricks</option>
                                            <option value="Commonfloor">Commonfloor</option>
                                            <option value="Indiaproperties">Indiaproperties</option>
                                            <option value="News Paper">News Paper</option>
                                            <option value="Reference">Reference</option>
                                            <option value="Hoding">Hoding</option>
                                            <option value="Trade Fair">Trade Fair</option>
                                            <option value="AM Data">AM Data</option>
                                            <option value="OFOS Data">FOS Data</option>
                                            <option value="Trade india">Trade india</option>
                                            <option value="India mart">India mart</option>
                                            <option value="Fapcci">Fapcci</option>
                                            <option value="Kompass">Kompass</option>
                                            <option value="cold call">cold call</option>
                                            <option value="apeda">apeda</option>
                                            <option value="Just dail">Just dail</option>
                                            <option value="Suleka">Suleka</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Company name</label>
                                    <div class="col-sm-10"><input type="text" value="<?php echo $data[5]; ?>" class="form-control" id="companyname" name="companyname" value="" placeholder="companyname"  required /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Contact person name</label>
                                    <div class="col-sm-10"><input type="text" value="<?php echo $data[6]; ?>" class="form-control" id="contactperson" name="contactperson" value="" placeholder="contact person name"  required /></div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Business line</label>
                                    <div class="col-sm-10"><input type="text" value="<?php echo $data[7]; ?>" class="form-control" id="businessline" name="businessline" value="" placeholder="Business line" required  /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Designation</label>
                                    <div class="col-lg-10">
                                    <select class="selectpicker show-tick form-control" id="datatype" data-live-search="true" name="designation" required>
                                            <option><?php echo $data[8]; ?></option>
                                            <option value="Asst.Mngr-Mktg">Asst.Mngr-Mktg</option>
                                            <option value="CEO">CEO</option>
                                            <option value="CFO">CFO</option>
                                            <option value="COO">COO</option>
                                            <option value="Director">Director</option>
                                            <option value="Director-Mktg">Director-Mktg</option>
                                            <option value="Executive Director">Executive Director</option>
                                            <option value="Manager">Manager</option>
                                            <option value="Managing Director">Managing Director</option>
                                            <option value="Managing Partner">Managing Partner</option>
                                            <option value="Proprietor">Proprietor</option>
                                            <option value="President">President</option>
                                            <option value="Vice President">Vice President</option>
                                        </select>
                                        </div>
                                </div>
                        
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Desision maker</label>
                                    <div class="col-lg-10">
                                    <select class="selectpicker show-tick form-control" id="datatype" data-live-search="true" name="desisionmaker" required >
                                    <option><?php echo $data[9]; ?></option>
                                    <option value="Yes">Yes </option>
                                    <option value="No">No </option>
                                    </select>
                                    </div>
                                </div>
                             
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Mobile</label>
                                    <div class="col-sm-10"><input type="text" value="<?php echo $data[10]; ?>" class="form-control" id="mobile" name="mobile" value="" placeholder="Mobile" required /></div>
                                </div>
                            
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Email id</label>
                                    <div class="col-sm-10"><input type="text" value="<?php echo $data[11]; ?>" class="form-control" id="emailid" name="emailid" value="" placeholder="Email id"  required /></div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Landline</label>
                                    <div class="col-sm-10"><input type="text"  value=" <?php echo $data[12]; ?>" class="form-control" id="landline" name="landline" value="" placeholder="Landline"  required /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                            
                                <div class="form-group"><label class="col-sm-2 control-label">Zipcode</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $data[13]; ?>" id="zipcode" name="zipcode" value="" placeholder="Zipcode"  required /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Products</label>
                                    <div class="col-sm-10"><input type="text" class="form-control"  value=" <?php echo $data[14]; ?>"id="products" name="products" value="" placeholder="Products"  required /></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-lg-2 control-label">Verified</label>
                                    <div class="col-lg-10">
                                        <select class="selectpicker show-tick form-control" id="verified" data-live-search="true" name="verified" required>
                                            <option><?php echo $data[15]; ?></option>
                                            <option value="yes">YES</option>
                                            <option value="no">NO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Website</label>
                                    <div class="col-sm-10"><input type="text" value="<?php echo $data[16]; ?>" class="form-control" id="website" name="website" value="" placeholder="Website"  required /></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
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
                
                var tax_amt = ( contract * 100 ) / 114.5;
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
<?php include_once "includes/footer.php"; ?>
<?php $current_page = 'dataentry list'; ?>
<?php include_once "includes/header.php"; ?>
    <div id="page-wrapper" class="gray-bg">
        <?php include_once "includes/top-menu.php"; ?>
        <br>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-12">
                <h2 class="pull-left">Data list</h2>
                <div class="pull-right">
                    <a href="dataentry" class="btn btn-primary btn-large margin-top-20"><i class="fa fa-plus"></i> Add New Data</a>
                </div>
            </div>
        </div>
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <table class="table table-hover no-margins">
                                        <thead>
                                            <tr>
                                                <th>Segment</th>
                                                <th>Date</th>
                                                <th>Datatype</th>
                                                <th>Company name</th>
                                                <th>Contact person name</th>
                                                <th>Business line</th>
                                                <th>Designation</th>
                                                <th>Decision maker</th>
                                                <th>Mobile</th>
                                                <th>Email id </th>
                                                <th> Landline</th>
                                                <th>Zipcode </th>
                                                <th> Products </th>
                                                <th> Verified</th>
                                                <th>Website </th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query = get_query('segment, date1, datatype,company_name,contact_person_name,business_line,Designation,decision_maker,mobile,email_id,landline,zipcode,products,verified,website,id', 'dataentry', '');
                                                while($data = mysqli_fetch_array($query, MYSQLI_NUM)):
                                            ?>
                                            <tr>
                                                <td> <?php echo $data[0]; ?></td>
                                                <td><?php echo $data[1]; ?></td>
                                                <td><?php echo $data[2];?> </td>
                                                <td> <?php echo $data[3]; ?></td>
                                                <td><?php echo $data[4]; ?></td>
                                                <td><?php echo $data[5];?> </td>
                                                <td> <?php echo $data[6]; ?></td>
                                                <td><?php echo $data[7]; ?></td>
                                                <td><?php echo $data[8];?> </td>
                                                <td> <?php echo $data[9]; ?></td>
                                                <td><?php echo $data[10]; ?></td>
                                                <td><?php echo $data[11];?> </td>
                                                <td> <?php echo $data[12]; ?></td>
                                                <td><?php echo $data[13]; ?></td>
                                                <td><?php echo $data[14];?> </td>
                                                <td><a href="edit-dataentry?id=<?php echo $data[15]; ?>" class="text-navy"><i class="fa fa-edit"></i> Edit</a></td>
                                                <td><a href="delete-dataentry?id=<?php echo $data[15]; ?>" class="text-navy"><i class="fa fa-trash" onclick="return confirm('Are you sure want to delete');"></i> Delete</a></td>
                                                
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include_once "includes/footer.php"; ?>

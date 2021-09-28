<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Admin Manager</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('edit_admin');
                            if (isset($msg)) {
                                echo $msg;
                                $this->session->unset_userdata('edit_admin');
                            }
                            ?>
                        </h3>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($all_admin as $v_admin) {
                                    ?>
                                    <tr>
                                        <td><?php echo $v_admin->admin_name; ?></td>
                                        <td><?php echo $v_admin->admin_email; ?></td>
                                        <td>
                                            <span style="color: green;">
                                                <?php
                                                if ($v_admin->admin_status == '1') {
                                                    echo 'Active';
                                                }
                                                ?> 
                                            </span>
                                            <span style="color: red;">   
                                                <?php
                                                if ($v_admin->admin_status == 0) {
                                                    echo 'Inactive';
                                                }
                                                ?>   
                                            </span>
                                        </td>
                                        <td>
                                            <?php
                                            if ($v_admin->admin_status == '1') {
                                                ?>
                                                <a href="<?php echo base_url(); ?>super_admin/deactive_admin/<?php echo $v_admin->admin_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Deactive Admin"><i class="fa fa-times"></i></a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="<?php echo base_url(); ?>super_admin/active_admin/<?php echo $v_admin->admin_id; ?>" class="btn btn-success" data-toggle="tooltip" title="Active Admin"><i class="fa fa-check"></i></a>
                                                <?php
                                            }
                                            ?>
                                            <a href="<?php echo base_url(); ?>super_admin/edit_admin/<?php echo $v_admin->admin_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Admin"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="<?php echo base_url(); ?>super_admin/delete_admin/<?php echo $v_admin->admin_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Admin" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>          
        </div>
    </div>
</div>

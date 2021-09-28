<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Menu Manager <small>Administrator Manager</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('edit_menu');
                            if (isset($msg)) {
                                echo $msg;
                                $this->session->unset_userdata('edit_menu');
                            }
                            ?>
                        </h3>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Code</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($all_menu as $v_menu) {
                                    ?>
                                    <tr>
                                        <td><?php echo $v_menu->product_name; ?></td>
                                        <td><img src="<?php echo $v_menu->product_image; ?>" class="img-responsive"/></td>
                                        <td><?php echo $v_menu->product_code; ?></td>
                                        <td><?php echo $v_menu->product_price; ?></td>
                                        <td><?php echo $v_menu->product_description; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>super_admin/edit_menu/<?php echo $v_menu->product_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Menu"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="<?php echo base_url(); ?>super_admin/delete_menu/<?php echo $v_menu->product_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Menu" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
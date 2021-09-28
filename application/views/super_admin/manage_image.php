<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Image Manager <small>Administrator Manager</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('edit_image');
                            if (isset($msg)) {
                                echo $msg;
                                $this->session->unset_userdata('edit_image');
                            }
                            ?>
                        </h3>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($all_image as $v_image) {
                                    ?>
                                    <tr>
                                        <td><img src="<?php echo base_url(). $v_image->image; ?>" class="img-responsive"/></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>super_admin/delete_image/<?php echo $v_image->image_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Image" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="btn-group btn-breadcrumb">
                <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                <a href="<?php echo base_url(); ?>super_admin/add_admin" class="btn btn-info">Add Admin</a>
                <a href="<?php echo base_url(); ?>super_admin/manage_admin" class="btn btn-success">Manage Admin</a>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Update Admin</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="<?php echo base_url(); ?>super_admin/update_admin" method="POST" name="admin" class="form-horizontal form-label-left" novalidate>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" value="<?php echo $admin_info->admin_name; ?>" required="required" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1">
                                    <input type="hidden" name="admin_id" value="<?php echo $admin_info->admin_id; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="email" value="<?php echo $admin_info->admin_email; ?>" required="required" id="email" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>         
                            <div class="item form-group">
                                <label class="control-label col-md-3">Change Password <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="password" value="<?php echo $admin_info->admin_password; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Status</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="status" class="form-control">
                                        <option>Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.forms['admin'].elements['status'].value = '<?php echo $admin_info->admin_status; ?>';
</script>
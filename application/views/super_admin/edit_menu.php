<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="btn-group btn-breadcrumb">
                <a href="<?php echo base_url(); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                <a href="<?php echo base_url(); ?>super_admin/add_menu" class="btn btn-info">Add Menu</a>
                <a href="<?php echo base_url(); ?>super_admin/manage_menu" class="btn btn-success">Manage Menu</a>
            </div>
        </div>
        <script>
            function copy(imageURL)
            {
                document.getElementById('image').value = imageURL;
            }
        </script>
        <br/>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Menu <small>Create New Administrator</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                    <div class="x_content">
                        <form action="<?php echo base_url(); ?>super_admin/update_menu" method="POST" class="form-horizontal form-label-left" novalidate>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Media Library</h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            foreach ($all_image as $v_image) {
                                                ?>
                                                <div class="col-md-3">
                                                    <img src="<?php echo base_url() . $v_image->image; ?>" class="img-responsive" onclick="copy('<?php echo base_url() . $v_image->image; ?>');" data-dismiss="modal"/>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <div class="modal-footer"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Name <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="name" value="<?php echo $menu_info->product_name; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                        <input type="hidden" name="product_id" value="<?php echo $menu_info->product_id; ?>">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Menu Code <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="code" value="<?php echo $menu_info->product_code; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Image <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <img src="<?php echo $menu_info->product_image; ?>" class="img-responsive"/><br/>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Edit Image</button>
                                        <input type="text" name="product_image" id="image" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $menu_info->product_image; ?>">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Price <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="price" value="<?php echo $menu_info->product_price; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="description" value="<?php echo $menu_info->product_description; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Special Product</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="radio">
                                            <label><input type="radio" name="special">Special Product</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label><input type="radio" name="special">Not Special Product</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                    <button id="send" type="submit" class="btn btn-success">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<style>
    .panel-body .btn:not(.btn-block) { width:120px;margin-bottom:10px; }
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-2" style="min-height: 600px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard
                    </h3>
                </div>
                <div class="panel-body" style="padding:5%;">
                    <div class="row">
                        <div class="col-xs-12 col-md-9">
                            <a href="<?php echo base_url(); ?>cart/show_cart" class="btn btn-danger btn-lg" role="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <br/>My Cart</a>
                            <a href="<?php echo base_url(); ?>customer/my_order" class="btn btn-primary btn-lg" role="button"><i class="fa fa-barcode" aria-hidden="true"></i> <br/>My Orders</a>
                            <a href="<?php echo base_url(); ?>customer/order_history" class="btn btn-primary btn-lg" role="button"><i class="fa fa-building" aria-hidden="true"></i> <br/>History</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-9">
            <h3 style="color:green">
                <?php
                $msg = $this->session->userdata('update_customer');
                if (isset($msg)) {
                    echo $msg;
                    $this->session->unset_userdata('update_customer');
                }
                ?>
            </h3>
            <form action="<?php echo base_url(); ?>customer/update_customer" method="POST" class="form-horizontal">
                <fieldset id="account">
                    <legend>Update Your Details</legend>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">Name</label>
                        <div class="col-xs-9">
                            <input type="text" name="customer_name" value="<?php echo $customer->customer_name; ?>" class="form-control">
                            <input type="hidden" name="customer_id" value="<?php echo $customer->customer_id; ?>">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label">E-Mail</label>
                        <div class="col-xs-9">
                            <input type="email" name="customer_email" value="<?php echo $customer->customer_email; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label">Current Password</label>
                        <div class="col-xs-9">
                            <input type="text" name="customer_password" value="<?php echo $customer->customer_password; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label">Mobile</label>
                        <div class="col-xs-9">
                            <input type="tel" name="customer_mobile"  value="<?php echo $customer->customer_mobile; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label">Address</label>
                        <div class="col-xs-9">
                            <input type="text" name="customer_address" value="<?php echo $customer->customer_address; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label">Address Landmark</label>
                        <div class="col-xs-9">
                            <input type="text" name="customer_landmark" value="<?php echo $customer->customer_landmark; ?>" class="form-control">
                        </div>
                    </div>
                </fieldset>
                <div class="buttons">
                    <div class="pull-right">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>  
    </div>
</div>
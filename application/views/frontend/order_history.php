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
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Invoice Date</th>
                            <th>Order Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($order_history as $v_order) {
                            ?>
                            <tr>
                                <td>FE# <?php echo $v_order->order_id; ?></td>
                                <td><?php echo $v_order->invoice_date; ?></td>
                                <td><?php echo $v_order->order_total; ?></td>
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
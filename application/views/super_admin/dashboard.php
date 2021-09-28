<div class="right_col" role="main">
    <div class="">
        <div class="row top_tiles">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Order Management</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th>Invoice Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($all_order as $v_order) {
                                    ?>
                                    <tr>
                                        <th><?php echo $v_order->order_id; ?></th>
                                        <th><?php echo $v_order->customer_name; ?></th>
                                        <th><?php echo $v_order->invoice_date; ?></th>
                                        <th><?php echo $v_order->order_total; ?></th>
                                        <td>
                                            <span style="color: green;">
                                                <?php
                                                if ($v_order->order_status == '1') {
                                                    echo 'Delivered';
                                                }
                                                ?> 
                                            </span>
                                            <span style="color: red;">   
                                                <?php
                                                if ($v_order->order_status == 0) {
                                                    echo 'Undelivered';
                                                }
                                                ?>   
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>super_admin/delete_order/<?php echo $v_order->order_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Order" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
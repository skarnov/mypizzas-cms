<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Shopping Cart</h4><hr/>
        </div>
        <div class="modal-body">
            <h1>Shopping Cart</h1>
            <br/>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center">Image</td>
                            <td class="text-left">Product Name</td>
                            <td class="text-left">Quantity</td>
                            <td class="text-right">Unit Price</td>
                            <td class="text-right">Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contents = $this->cart->contents();
                        foreach ($contents as $v_contents) {
                            ?>
                            <tr>
                                <td class="text-center" style="width: 200px; height: 100px;"> 
                                    <a href=""><img src="<?php echo $v_contents['image']; ?>" class="img-thumbnail"></a>
                                </td>
                                <td class="text-left">
                                    <a href="">
                                        <?php echo $v_contents['name']; ?>
                                    </a>
                                </td>
                                <td class="text-left">
                                    <div class="input-group btn-block" style="max-width: 200px;">
                                        <form action="<?php echo base_url(); ?>cart/update_cart" method="POST">
                                            <input type="hidden"  value="<?php echo $v_contents['rowid']; ?>" name="rowid"/>
                                            <input type="number" name="product_quantity" value="<?php echo $v_contents['qty']; ?>" class="form-control" style="width: 60px;">&nbsp;
                                            <button type="submit" class="btn btn-primary" title="Update"><i class="fa fa-refresh"></i></button>
                                            <a href="<?php echo base_url(); ?>cart/remove/<?php echo $v_contents['rowid']; ?>" title="Remove" class="btn btn-danger"><i class="fa fa-times-circle"></i></a>
                                        </form>
                                    </div>
                                </td>
                                <td class="text-right"><?php echo $v_contents['price']; ?></td>
                                <td class="text-right"><?php echo $v_contents['subtotal']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php
            $total = $this->cart->total();
            $grand_total = $total;
            $sdata = array();
            $sdata['grand_total'] = $grand_total;
            $this->session->set_userdata($sdata);
            ?>
            <div class="row">
                <div class="col-xs-6 pull-right">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-right"><strong>Total:</strong></td>
                                    <td class="text-right"><?php echo $grand_total; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="buttons">
                <div class="pull-left">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Continue Shopping</button>
                </div>
                <?php
                if ($grand_total > 0) {
                    ?>
                    <div class="pull-right"><a href="<?php echo base_url(); ?>checkout" class="btn btn-primary">Checkout</a></div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
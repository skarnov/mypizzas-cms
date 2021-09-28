<div class="banner">
    <div class="container">
        <h3 style="color:red; text-align: center;">
            <?php
            $exc = $this->session->userdata('exception');
            if (isset($exc)) {
                echo $exc;
                $this->session->unset_userdata('exception');
            }
            ?>
        </h3>
    </div>
</div>

<!-- Pizza Menu -->
<div class="latis" id="menuitem">
    <div class="container">
        <h2 class="section-title text-center">Pizza Menu</h2>
        <p class="lead main text-center">Most appetizing pizza you've never eaten before!</p>
        <?php
        foreach ($special_menu as $v_menu) {
            ?>
            <div class="col-md-4 latis-left">
                <h3><?php echo $v_menu->product_name; ?></h3>
                <img src="<?php echo $v_menu->product_image; ?>" class="img-responsive" alt="">
                <div class="special-info grid_1 simpleCart_shelfItem">
                    <p><?php echo $v_menu->product_description; ?></p>
                    <div class="cur">
                        <div class="cur-left">
                            <div class="item_add">
                                <span class="item_price">
                                    <a class="morebtn hvr-rectangle-in" data-toggle="modal" data-target="#totalCart" onclick="addToCart(<?php echo $v_menu->product_id; ?>);">Add to cart</a>
                                </span>
                            </div>
                        </div>
                        <div class="cur-right">
                            <div class="item_add"><span class="item_price"><h6><?php echo $v_menu->product_price; ?></h6></span></div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="clearfix"></div>
    </div>
</div>
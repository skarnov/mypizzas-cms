<!DOCTYPE HTML>

<html>
    <head>
        <title><?php echo $title; ?></title>
        <link href="<?php echo base_url(); ?>asset/frontend/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
        <link href="<?php echo base_url(); ?>asset/frontend/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700' rel='stylesheet' type='text/css'>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="<?php echo base_url(); ?>asset/frontend/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/frontend/js/bootstrap.min.js"></script>	
    </head>

    <body>
        <div class="header">
            <div class="container">
                <div class="logo">
                    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>asset/frontend/images/logo.png" class="img-responsive" alt=""></a>
                </div>
                <div class="header-left">
                    <div class="head-nav">
                        <span class="menu"></span>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a href="<?php echo base_url(); ?>restaurant/menu">Pizza Menu</a></li>
                            <?php
                            $customer_id = $this->session->userdata('customer_name');
                            if ($customer_id == NULL) {
                                ?>
                                <li><a data-toggle="modal" data-target="#login">Login</a></li>
                                <li><a data-toggle="modal" data-target="#register">Register</a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="<?php echo base_url(); ?>restaurant/logout">Logout</a></li>
                                <li><a href="<?php echo base_url(); ?>customer">Dashboard</a></li>
                                <?php
                            }
                            ?>
                            <li><a href="<?php echo base_url(); ?>restaurant/about">About</a></li>
                            <li><a href="<?php echo base_url(); ?>restaurant/contact">Contact</a></li>
                            <li><a href="<?php echo base_url(); ?>cart/show_cart">Checkout</a></li>
                            <div class="clearfix"></div>		
                        </ul>
                        <!-- Script For Nav -->
                        <script>
                            $("span.menu").click(function () {
                                $(".head-nav ul").slideToggle(300, function () {
                                });
                            });
                        </script>
                        <!-- Script For Nav --> 
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>

        <?php echo $home; ?>

        <!-- Footer-->
        <div class="footer">
            <div class="container">
                <div class="footer-left">
                    <p>Copyrights © 2017 My Pizza. All Rights Reserved.</p>
                </div>
                <div class="footer-right">
                    <ul>
                        <li><a href="https://www.facebook.com/mypizzalinz/?fref=ts"><i class="fbk"></i></a></li>
                        <li><a href="https://www.instagram.com/mypizzalinz/"><i class="googpl"></i></a></li>
                        <li><a href="#"><i class="link"></i></a></li>
                        <li><a href="#"><i class="rss"></i></a></li>
                        <li><a href="#"><i class="twt"></i></a></li>
                    </ul>
                </div>	
                <div class="clearfix"></div>
            </div>
        </div>
        
        <!--LOGIN MODAL -->
        <div class="modal fade" id="login" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Login</h4><hr/>
                    </div>
                    <form action="<?php echo base_url(); ?>restaurant/customer_login_check" method="POST" role="form" style="display: block;">
                        <div class="modal-body">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="email" name="customer_email" placeholder="Email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="customer_password" placeholder="Password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="" class="forgot-password">Forgot Password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit"class="btn btn-danger">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--REGISTER MODAL -->
        <div class="modal fade" id="register" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Register</h4><hr/>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="<?php echo base_url(); ?>restaurant/login" method="post" role="form" style="display: block;">
                                        <div class="form-group">
                                            <input type="text" name="customer_name" placeholder="Name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="customer_email" placeholder="Email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="customer_password" placeholder="Password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="customer_mobile" placeholder="Mobile" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="customer_address" placeholder="Address" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="customer_landmark" placeholder="Address Landmark" class="form-control">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo base_url(); ?>restaurant/register" type="button" class="btn btn-danger">Register</a>
                    </div>
                </div>
            </div>
        </div>

        <!--SHOPPING CART MODAL-->
        <div class="modal fade" id="totalCart" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Shopping Cart</h4><hr/>
                    </div>
                    <div class="modal-body">
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
        </div>

        <script>
            var xmlhttp = false;
            try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (E) {
                    xmlhttp = false;
                }
            }
            if (!xmlhttp && typeof XMLHttpRequest !== 'undefined') {
                xmlhttp = new XMLHttpRequest();
            }
            function addToCart(productId)
            {
                if (productId) {
                    serverPage = '<?php echo base_url(); ?>cart/add_to_cart/' + productId + '/';
                    xmlhttp.open("GET", serverPage);
                    xmlhttp.onreadystatechange = function ()
                    {
                        document.getElementById('totalCart').innerHTML = xmlhttp.responseText;
                    };
                    xmlhttp.send(null);
                }
            }
        </script>
    </body>
</html>
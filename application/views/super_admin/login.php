<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Secure Login</title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>asset/backend/css/bootstrap.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url(); ?>asset/backend/css/custom.css" rel="stylesheet">
    </head>

    <body>
        <div class="container body">
            <div class="main_container">
                <div class="login_wrapper">
                    <div class="animate form login_form">
                        <section class="login_content">
                            <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                            <h3 style="color:red">
                                <?php
                                $exc = $this->session->userdata('exception');
                                if (isset($exc)) {
                                    echo $exc;
                                    $this->session->unset_userdata('exception');
                                }
                                ?>
                            </h3>
                            <form action="<?php echo base_url(); ?>auth/check_admin_login" method="POST">
                                <h1>Dashboard</h1>
                                <div>
                                    <input type="email" name="email" placeholder="E-Mail" required="" class="form-control"/>
                                </div>
                                <div>
                                    <input type="password" name="password" placeholder="Password" required="" class="form-control" />
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-danger">Login</button>
                                </div>
                                <div class="clearfix"></div>
                                <div class="separator">
                                    <div class="clearfix"></div>
                                    <div style="color: white;">
                                        <p>© 2014 - <?php echo date('Y'); ?> All Rights Reserved</p>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
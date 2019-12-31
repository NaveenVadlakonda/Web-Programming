<!DOCTYPE html>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" lang="en">  <!--<![endif]-->
    <head>

        <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>T Service</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Styles -->

        <!-- Bootstrap -->
        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
        <!-- Forms -->
        <link href="<?php echo base_url('css/jquery.idealforms.css'); ?>" rel="stylesheet">
        <!-- Select  -->
        <link href="<?php echo base_url('css/jquery.idealselect.css'); ?>" rel="stylesheet">
        <!-- Slicknav  -->
        <link href="<?php echo base_url('css/slicknav.css'); ?>" rel="stylesheet">
        <!-- Main style -->
        <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">

        <!-- Modernizr -->
        <script type="text/javascript" src="<?php echo base_url('js/modernizr.js'); ?>"></script>

        <!-- Fonts -->
        <link href="<?php echo base_url('css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <header class="header">

            <div class="top-menu">

                <section class="container">
                    <div class="row">
                        <?php if($temp == 0){?>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="user-log">

                                    <a data-toggle="modal" data-target="#loginModal">
                                        Log in
                                    </a> 
                                </div><!-- end .user-log -->
                            </div><!-- end .col-sm-4 -->
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="cart">
                                 <a data-toggle="modal" data-target="#regModal">
                                        Sign up
                                    </a>
                                </div><!-- end .user-log -->
                            </div><!-- end .col-sm-4 -->
                        <?php } ?>
                        <?php if($temp == 1){?>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="user-log">
                                    <a href="<?php echo site_url();?>/App/home"><?php echo $username ?></a>
                                </div><!-- end .user-log -->
                            </div>
                             <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="cart">
                                    <a href="<?php echo site_url();?>/App/logout">Log out</a>
                                </div><!-- end .user-log -->
                             </div><!-- end .col-sm-4 -->
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="sign">
                                    <a data-toggle="modal" data-target="#modalCart">Cart</a>

                                </div><!-- end .user-log -->
                             </div><!-- end .col-sm-4 -->
                        <?php }?>
                    </div><!-- end .row -->
                </section><!-- end .container -->

            </div><!-- end .top-menu -->

            <div class="main-baner">

                <div class="fullscreen background parallax clearfix" style="background-image:url('<?php echo base_url("img/tumblr_n7yhhvUQtx1st5lhmo1_1280.jpg"); ?>');" data-img-width="1600" data-img-height="1064">

                    <div class="main-parallax-content">

                        <div class="second-parallax-content">

                            <section class="container">

                                <div class="row">

                                    <div class="main-header-container clearfix">

                                        <div class="col-md-4 col-sm-12 col-xs-12">

                                            <div class="logo">
                                                <h1>T Service</h1>
                                            </div><!-- end .logo -->

                                        </div><!-- end .col-sm-4 -->
                                        <?php if($temp == 1){?>
                                             <div class="col-md-8 col-sm-8 col-xs-12">

                                                <nav id="nav" class="main-navigation">

                                                    <ul class="navigation">
                                                        <li>
                                                            <a href="<?php echo site_url();?>/App/home">Flights</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo site_url();?>/App/cars">Rent Cars</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo site_url();?>/App/bookings">MyBookings</a>
                                                        </li>
                                                    </ul>

                                                </nav><!-- end .main-navigation -->

                                            </div><!-- end .col-md-8 -->
                                        <?php } ?>
                                    </div><!-- end .main-header-container -->
                                </div><!-- end .row -->
                            </section><!-- end .container -->
        </div><!-- end .second-parallax-content -->
                    </div><!-- end .main-parallax-content -->

                </div><!-- end .background .parallax -->

            </div><!-- end .main-baner -->

        </header><!-- end .header -->
        <section class="main-content">

            <div class="container">
                <div class="row">

                    <div class="page-content">

                        <div class="services clearfix">

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="page-sub-title textcenter">
                                    <h2>Services</h2>
                                    <div class="line"></div>
                                </div><!-- end .page-sub-title -->

                            </div><!-- end .col-md-12 col-sm-12 col-xs-12 -->

                            <div class="col-md-4 col-sm-4 col-xs-12">

                                <article class="service">

                                    <i class="fa fa-car"></i>

                                    <h3>Rent a car</h3>
                                    


                                </article><!-- end .service -->

                            </div><!-- end .col-md-4 -->

                            <div class="col-md-4 col-sm-4 col-xs-12">

                                <article class="service">

                                   <i class="fa fa-fighter-jet"></i>

                                    <h3>Flight Bookings</h3>
                                    

                                </article><!-- end .service -->

                            </div><!-- end .col-md-4 -->

                            <div class="col-md-4 col-sm-4 col-xs-12">

                                <article class="service">

                                    <img  height="100" src="<?php echo base_url("img/parking.png"); ?>">
                                    <h3>Pre Pay Parking Services</h3>
                                   


                                </article><!-- end .service -->

                            </div><!-- end .col-md-4 -->

                        </div><!-- end .services -->

                        <div class="clearfix"></div>
                    </div><!-- end .page-content -->
                </div><!-- end .row -->
            </div><!-- end .container -->

        </section><!-- end .main-content -->

        

        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div><!-- end .modal-header -->

                    <div class="modal-body">
                        <form action="<?php echo site_url('/App/signin')?>" method="post" novalidate autocomplete="off" class="idealforms login">

                            <div class="log-header">
                                <span class="log-in">Log in</span>
                            </div>

                            <div class="field">
                                <input name="username" type="text" placeholder="Username">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <input type="password" name="password" placeholder="Password">
                                <span class="error"></span>
                            </div>

                            <div class="field buttons">
                                <button type="submit" name="login" class="submit btn green-color">Log in</button>
                            </div>
                            <div class="clearfix"></div>

                        </form><!-- end .login -->
                    </div><!-- end .modal-body -->

                </div><!-- end .modal-content -->
            </div><!-- end .modal-dialog -->
        </div><!-- end .modal -->

        <div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form action="<?php echo site_url('/App/register')?>" method="post" novalidate autocomplete="off" class="idealforms reg">

                            <div class="log-header">
                                <span class="log-in">Sign up</span>
                            </div>

                            <div class="field">
                                <input name="username" type="text" placeholder="Username">
                                <span class="error"></span>
                            </div>
                            <div class="field">
                                <input name="fname" type="text" placeholder="First Name">
                                <span class="error"></span>
                            </div>
                             <div class="field">
                                <input name="lname" type="text" placeholder="Last Name">
                                <span class="error"></span>
                            </div>

                            <div class="field">
                                <input name="email" type="email"  placeholder="E-Mail">
                                <span class="error"></span>
                            </div>
                            <div class="field">
                                <input type="text" name="phoneno" placeholder="Phono Number">
                                <span class="error"></span>
                            </div>
                            <div class="field">
                                <input type="password" name="password" placeholder="Password">
                                <span class="error"></span>
                            </div>

                

                            <div class="field buttons">
                                <button type="submit" name="register" class="submit btn green-color">Sign Up</button>
                            </div>

                            <div class="clearfix"></div>

                        </form><!-- end .reg -->
                    </div><!-- end .modal-body -->

                </div><!-- end .modal-content -->
            </div><!-- end .modal-dialog -->
        </div><!-- end .modal -->

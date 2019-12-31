<footer id="footer">
            <div class="footer-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            Copyright by T Service
                        </div>
                    </div><!-- end .row -->
                </div><!-- end .container -->
            </div><!-- end .footer-copyright -->
        </footer><!-- end #footer -->

        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div><!-- end .modal-header -->

                    <div class="modal-body">
                        <form action="<?php echo site_url('/Login/signin')?>" method="post" novalidate autocomplete="off" class="idealforms login">

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
                        <form action="service.php" method="post" novalidate autocomplete="off" class="idealforms reg">

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

                            <div class="field">
                                <input name="confirmpass" type="password"  placeholder="Password">
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

        <!-- Javascript -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
        <!-- Main jQuery -->
        <script type="text/javascript" src="<?php echo base_url('js/jquery.main.js'); ?>"></script>
        <!-- Form -->
        <script type="text/javascript" src="<?php echo base_url('js/jquery.idealforms.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/jquery.idealselect.min.js'); ?>"></script>
        <!-- Menu -->
        <script type="text/javascript" src="<?php echo base_url('js/hoverIntent.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/superfish.js'); ?>"></script>
        <!-- Counter-Up  -->
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('js/jquery.counterup.min.js'); ?>"></script>
        <!-- Rating  -->
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap-rating-input.min.js'); ?>"></script>
        <!-- Slicknav  -->
        <script type="text/javascript" src="<?php echo base_url('js/jquery.slicknav.min.js'); ?>"></script>

    </body>

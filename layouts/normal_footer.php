</div>
</div>
    <!-- =============== Start of Footer 1 =============== -->
    <footer class="footer1">

      

        <!-- ===== Start of Footer Copyright Section ===== -->
        <div class="copyright ptb40">
            <div class="container">

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <span>Copyright &copy; <a href="index.php">PickJobsBD</a>. All Rights Reserved</span>
                </div>


            </div>
        </div>
        <!-- ===== End of Footer Copyright Section ===== -->

    </footer>
    <!-- =============== End of Footer 1 =============== -->





    <!-- ===== Start of Back to Top Button ===== -->
    <a href="#" class="back-top"><i class="fa fa-chevron-up"></i></a>
    <!-- ===== End of Back to Top Button ===== -->





    <!-- ===== Start of Login Pop Up div ===== -->
    <div class="cd-user-modal">
        <!-- this is the entire modal form, including the background -->
        <div class="cd-user-modal-container">
            <!-- this is the container wrapper -->
            <ul class="cd-switcher">
                <li><a href="#0">Personal Account</a></li>
                <li><a href="#1">Company Account</a></li>
            </ul>

            <div id="cd-login" >
                <!-- log in form personal -->
                <form class="cd-form" action="includes/seeker_validation.php" method='post'>
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="email">Email</label>
                        <input class="full-width has-padding has-border" type="email" id="email" name="email" placeholder='Email'>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace cd-password" for="cpassword">Password</label>
                        <input class="full-width has-padding has-border" id="password" name="password" type="password" placeholder="Password">
                    </p>
                    <p class="fieldset">
                        <button type="submit" value="Login" name='submit' class="btn btn-blue btn-effect">Login</button>
                    </p>
                </form>
            </div>
            <!-- cd-login -->

            <div id="cd-signup">
                <!-- log in company -->
                <form class="cd-form" action="includes/company_admin_validation.php" method='post'>
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="cemail">Email</label>
                        <input class="full-width has-padding has-border" type="email" id="cemail" name="cemail" placeholder='Email'>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace cd-password" for="cpassword">Password</label>
                        <input class="full-width has-padding has-border" id="cpassword" name="cpassword" type="password" placeholder="Password">
                    </p>
                    <p class="fieldset">
                        <button type="submit" value="Login" name='submit' class="btn btn-blue btn-effect">Login</button>
                    </p>
                </form>
            </div>
            <!-- cd-signup -->
        </div>
        <!-- cd-user-modal-container -->
    </div>
    <!-- cd-user-modal -->
    <!-- ===== End of Login Pop Up div ===== -->





    <!-- ===== All Javascript at the bottom of the page for faster page loading ===== -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/jquery.ajaxchimp.js"></script>
    <script src="js/jquery.countTo.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.easypiechart.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/tinymce/tinymce.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>

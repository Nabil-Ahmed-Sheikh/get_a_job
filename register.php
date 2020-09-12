<?php require_once('layouts/normal_header.php'); ?>
<?php 
    $industries = IndustryType::find_all();

?>


    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>register</h2>
                </div>
            </div>
            <!-- End of Page Title -->
        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->





    <!-- ===== Start of Login - Register Section ===== -->
    <section class="ptb80" id="register">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Start of Nav Tabs -->
                    <ul class="nav nav-tabs" role="tablist">

                        <!-- Personal Account Tab -->
                        <li role="presentation" class="active">
                            <a href="#personal" aria-controls="personal" role="tab" data-toggle="tab" aria-expanded="true">
                                <h6>Personal Account</h6>
                                <span>I'm looking for a job</span>
                            </a>
                        </li>

                        <!-- Company Account Tab -->
                        <li role="presentation" class="">
                            <a href="#company" aria-controls="company" role="tab" data-toggle="tab" aria-expanded="false">
                                <h6>Company Account</h6>
                                <span>We are hiring</span>
                            </a>
                        </li>
                    </ul>
                    <!-- End of Nav Tabs -->



                    <!-- Start of Tab Content -->
                    <div class="tab-content ptb60">

                        <!-- Start of Tabpanel for Personal Account -->
                        <div role="tabpanel" class="tab-pane active" id="personal">
                        <form action='includes/seeker_registration.php' method="post">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">

                                
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="username" class="form-control">
                                    </div>

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" name="phoneNumber">
                                    </div>

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>

                                    <!-- Form Group -->
                                    <div class="form-group text-center nomargin">
                                        <button type="submit" name='submit' value='submit' class="btn btn-blue btn-effect">create account</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <!-- End of Tabpanel for Personal Account -->

                        <!-- Start of Tabpanel for Company Account -->
                        <div role="tabpanel" class="tab-pane" id="company">
                            <form action="includes/company_admin_registration.php" method="post">
                            <div class="row">
                            
                                <!-- Start of the First Column -->
                                <div class="col-md-6">
                                

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label>Name<span class="required">*</span></label>
                                        <input type="text" name='contactPersonName' class="form-control">
                                    </div>

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" name='contactPersonDesignation' class="form-control">
                                    </div>

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label>Email<span class="required">*</span></label>
                                        <input type="email" name='contactPersonEmail'  class="form-control">
                                    </div>

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label>Password<span class="required">*</span></label>
                                        <input type="password" name='password' class="form-control">
                                    </div>

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" name='contactPersonNumber' class="form-control">
                                    </div>

                                    

                                
                                </div>
                                <!-- End of the First Column -->

                                <!-- Start of the Second Column -->
                                <div class="col-md-6">

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" name="companyName" class="form-control">
                                    </div>

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label>Industry Type</label>
                                        <select name="industryType" class="selectpicker" data-size="5"  required>
                                            <?php foreach($industries as $industry) { ?>
                                            <option value="<?php echo $industry->id;?>"><?php echo $industry->name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label>Business Description</label>
                                        <input type="text" name='businessDescription' class="form-control">
                                    </div>

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" name='websiteURL' class="form-control">
                                    </div>
                                </div>

                                
                                <!-- End of the Second Column -->
                            </div>

                            <div class="row mt20">
                                <div class="col-md-12 text-center">

                                   
                                    <!-- Form Group -->
                                    <div class="form-group nomargin">
                                        <button type="submit" name='submit' class="btn btn-blue btn-effect">create account</button>
                                    </div>
                                    
                                </div>
                            </div>
                            </form>
                        </div>
                        <!-- End of Tabpanel for Company Account -->

                    </div>
                    <!-- End of Tab Content -->

                </div>
            </div>
        </div>
    </section>
    <!-- ===== End of Login - Register Section ===== -->









    <!-- =============== Start of Footer 1 =============== -->
    <footer class="footer1">


<?php require_once('layouts/normal_footer.php'); ?>
<?php require_once('../layouts/company_header.php'); ?>
<?php 
    if(isset($_GET['id'])){
        $circular = Circular::find_by_id($_GET['id']);
    } else {
        redirect_to('index.php');
    }
?>

<link rel="stylesheet" href="../css/custom.css">
<link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">


    <!-- ===== Start of Main Wrapper Job Section ===== -->
    <section class="ptb80" id="job-page">
        <div class="container">

            <!-- Start of Row -->
            <div class="row">

                <!-- ===== Start of Job Details ===== -->
                <div class="col-md-8 col-xs-12">

                    <!-- Start of Company Info -->
                    <div class="row company-info">

                        <!-- Job Company Image -->
                        

                        <!-- Job Company Info -->
                        <div class="col-md-6">
                            <div class="job-company-info mt30">
                                <h4 class="H3"><?php echo $circular->position;?></h4>
                                <p class="Bold"><?php echo $circular->companyName;?></p>

                                
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="companyLogo">
                                
                                <img style="max-width: 80px" src="<?php echo '../images/company/'.$circular->photo;?>" alt="">
                                
                            </div>
                        </div>

                    </div>
                    <!-- End of Company Info -->


                    <!-- Start of Job Details -->
                    <div class="row job-details mt40">
                        <div class="col-md-12">
                            
                            <br>
                            <!-- Vimeo Video -->
                            <!-- <div class="mt30"  >
                                <img style='padding-bottom:2%; max-width: 600px;'src="<?php echo '../images/company/'.$circular->photo;?>" alt="">
                            </div> -->
                            
                            <?php echo $circular->description ; ?>
                            
                        </div>
                    </div>
                    <!-- End of Job Details -->

                </div>
                <!-- ===== End of Job Details ===== -->





                <!-- ===== Start of Job Sidebar ===== -->
                <div class="col-md-4 col-xs-12">

                    <!-- Start of Job Sidebar -->
                    <div class="sideBar">
                        <div class="sideBarTitleContainer">
                            <h4 class="uppercase sideBarTitle" >Job Info</h4>
                        </div>
                        
                        <div class="sideBarBody">
                            <ul class="">
                                
                            <li class="sideBarList">
                                    <h5 class="H5"><i class="fa fa-calendar"></i> Published on:
                                    <span><?php echo $circular->postDate?></span></h5>
                                </li>
                                <li class="sideBarList">
                                    <h5 class="H5"><i class="fa fa-map-marker"></i> Location:
                                    <span><?php echo $circular->location?></span></h5>
                                </li>

                                <li class="sideBarList">
                                    <h5 class="H5"><i class="fa fa-money"></i> Experience Required:
                                    <span><?php echo $circular->experienceRequired;?></span></h5>
                                </li>

                                <li class="sideBarList">
                                    <h5 class="H5"><i class="fa fa-money"></i> Salary:
                                    <span><?php echo $circular->salaryMin." - ".$circular->salaryMax; ?></span></h5>
                                </li>

                                <li class="sideBarList">
                                    <h5 class="H5"><i class="fa fa-warning"></i> Deadline:
                                    <span><?php echo $circular->deadline; ?></span></h5>
                                </li>
                            </ul>
                            <div class="flex-container">
                                
                                    <div class="">
                                        
                                        <form action="circular_update.php" method='post'>
                                            <input type="hidden" name='id' value="<?php echo $circular->id;?>">
                                            <input type='submit' name='update' value='update' class="btn btn-blue btn-effect" placeholder="Apply" />
                                        </form>
                                        
                                    </div>
                                    <div class="">
                                        <form action="../includes/circular_update_handle.php" method='post'>
                                            <input type="hidden" name='id' value="<?php echo $circular->id;?>">
                                            <input type='submit' name='delete' value='delete' class="btn btn-red btn-effect" placeholder="Apply" />
                                        </form>
                                    </div>
                                
                            </div>
                            
                            
                        </div>
                    </div>
                    <!-- Start of Job Sidebar -->



                </div>
                <!-- ===== End of Job Sidebar ===== -->

            </div>
            <!-- End of Row -->




        </div>
    </section>
    <!-- ===== End of Main Wrapper Job Section ===== -->






    <?php require_once("../layouts/seeker_footer.php"); ?>

<?php require_once('../layouts/seeker_header.php'); ?>

<?php 
    $user_id = $session->user_id;
    $seeker = Seeker::find_by_id($user_id);
    $personalInfo = PersonalInfo::find_by_id($user_id);
    $educations = Education::find_all_order_by_date($user_id);
    $skills = Skill::find_all_order_by_percentage($user_id);
    $employments = Employment::find_all_order_by_date($user_id);
    
?>
<?php if($personalInfo) { ?>

    <!-- ===== Start of Candidate Profile Header Section ===== -->
    <section class="profile-header">
    </section>
    <!-- ===== End of Candidate Header Section ===== -->





    <!-- ===== Start of Main Wrapper Candidate Profile Section ===== -->
    <section class="pb80" id="candidate-profile">
        <div class="container">

            <!-- Start of Row -->
            <div class="row candidate-profile">

                <!-- Start of Profile Picture -->
                <div class="col-md-3 col-xs-12">
                    <div class="profile-photo">
                        <img src="<?php echo ('../images/seeker/'.$personalInfo->image);?>" class="img-responsive" alt="">
                    </div>


                </div>
                <!-- End of Profile Picture -->

                <!-- Start of Profile Description -->
                <div class="col-md-9 col-xs-12">
                    <div class="profile-descr">

                        <!-- Profile Title -->
                        <div class="profile-title">
                            <h2 class="capitalize"><?php echo $personalInfo->firstName.' '.$personalInfo->lastName ; ?></h2>
                            <h5 class="pt10"><i class="fa fa-map-marker"></i><?php echo " ".$personalInfo->currentAddress; ?></h5>
                        </div>

                        <!-- Profile Details -->
                        <!-- <div class="profile-details mt20">
                            <p>Front end developers use HTML, CSS, and JavaScript to code the website and web app designs created by web designers. The code they write runs inside the user’s browser (as opposed to a back end developer, whose code runs on the web server). Being also in charge of making sure that there are no errors or bugs on the front end, as well as making sure that the design appears as it’s supposed to across various platforms and browsers.</p>
                        </div> -->

                        <ul class="profile-info mt20 nopadding">
                            <?php if($personalInfo->fatherName) {?>
                            <li>
                                <span>Father: <?php echo $personalInfo->fatherName; ?></span>
                            </li>
                            <?php } ?>

                            <?php if($personalInfo->motherName) {?>
                            <li>
                                <span>Mother: <?php echo $personalInfo->motherName; ?></span>
                            </li>
                            <?php } ?>

                            <li>
                                <i class="fa fa-venus-mars"></i>
                                <span><?php echo $personalInfo->maritalStatus; ?></span>
                            </li>

                            <li>
                                <i class="fa fa-birthday-cake"></i>
                                <span><?php echo $personalInfo->dateOfBirth; ?></span>
                            </li>

                            <li>
                                <i class="fa fa-phone"></i>
                                <span><?php echo $personalInfo->phoneNumber1; ?></span>
                            </li>

                            <li>
                                <i class="fa fa-envelope"></i>
                                <span><?php echo $personalInfo->email; ?></span>
                            </li>
                        </ul>

                    </div>
                </div>
                <!-- End of Profile Description -->

            </div>
            <!-- End of Row -->



    <!-- ===== Start of Education Section ===== -->
    <section class="education ptb80">
        <div class="container">

            <div class="col-md-12 text-center">
                <h3 class="pb60">Education</h3>
            </div>




            <!-- Start of Education Column -->
            <div class="col-md-12 mt40">
                <div class="item-block shadow-hover">

                <?php foreach($educations as $education){ ?>
                    <!-- Start of Education Header -->
                    <div class="education-header clearfix">
                        <div>
                            <h4><?php echo $education->degreeLevel; ?> <small>- <?php echo $education->degreeTitle; ?></small></h4>
                            <h5><?php echo $education->institution; ?></h5>
                        </div>
                        <h6 class="time"><?php echo $education->passYear; ?></h6>
                    </div>
                    <!-- End of Education Header -->

                    <!-- Start of Education Body -->
                    <div class="education-body">
                        <ul>
                            <li>CGPA: <?php echo $education->cgpa; ?></li>
                            <li>Scale: <?php echo $education->scale; ?></li>
                            <li>Division: <?php echo $education->division; ?></li>
                        </ul>
                    </div>
                    <!-- End of Education Body -->
                <?php } ?>
                </div>
            </div>
            <!-- End of Education Column -->

        </div>
    </section>
    <!-- ===== End of Education Section ===== -->




            <!-- Start of Row -->
            <div class="row skills mt40">

                <div class="col-md-12 text-center">
                    <h3 class="pb40">My Skills</h3>
                </div>

                <!-- Start of Skill Bars Wrapper -->
                <div class="col-md-12 col-xs-12 mt20">
                    <!-- Start of Skill Bar -->
                    <?php foreach($skills as $skill){ ?>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" 
                        style="width: <?php echo $skill->percentage ?>%" 
                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <?php echo $skill->skillName."  ".$skill->percentage."%"; ?>
                        </div>
                    </div>

                    <?php } ?>
                    
                    <!-- End Skill Bar -->
                 
                </div>
                <!-- End of Skill Bars Wrapper -->

            </div>
            <!-- End of Row -->

        </div>
    </section>
    <!-- ===== End of Candidate Profile Section ===== -->






    <!-- ===== Start of Work Experience Section ===== -->
    <section class="work-experience ptb80">
        <div class="container">

            <div class="col-md-12 text-center">
                <h3 class="pb60">Work Experience</h3>
            </div>

            <?php foreach($employments as $employment){ ?>

            <!-- Start of Work Experience Column -->
            <div class="col-md-12">
                <div class="item-block shadow-hover">
                    
                    <!-- Start of Work Experience Header -->
                    <div class="experience-header clearfix">
                        
                        <div>
                            <h4><?php echo $employment->companyName;?></h4>
                            <h5><small><?php echo $employment->designation?></small></h5>
                        </div>
                        <h6 class="time"><?php echo $employment->workedFrom;?> to <?php if($employment->workedTill > "2099-01-01"){
                            echo 'Still Working';} else {echo $employment->workedTill; } ?></h6>
                    </div>
                    <!-- End of Work Experience Header -->

                    <!-- Start of Work Experience Body -->
                    <div class="experience-body">
                        <p><?php echo $employment->responsibility; ?></p>
                    </div>
                    <!-- End of Work Experience Body -->

                </div>
            </div>
            <!-- End of Work Experience Column -->
            
        <?php } ?>    

        </div>
    </section>
    <!-- ===== End of Work Experience Section ===== -->

<?php } else { ?>
    <div class="container" style="min-height: 70vh; text-align:center">
        <h2 style='padding: 10%'>No Portfoilo was created</h2>
    </div>
<?php } ?>






    <?php require_once("../layouts/seeker_footer.php"); ?>

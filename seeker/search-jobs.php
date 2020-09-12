<?php require_once('../layouts/seeker_header.php'); ?>
<?php 
    $industries = IndustryType::find_all(); 
?>

<?php 
    if(isset($_POST['search'])){
        $maxSal = $_POST['maxSalary'];
        $minSal = $_POST['minSalary'];
        $jobLevel = $_POST['jobLevel'];
        $jobType = $_POST['jobType'];
        $industryType = $_POST['industryType'];
        $pattern = '%'.$_POST['location'].'%';
        
        $sql = "Select circular.* from circular inner join company_admin on circular.uid = company_admin.id where ";
        if($_POST['jobLevel'] != ''){
            $sql .= "circular.jobLevel = "."'".$jobLevel."'";
        }
        if($_POST['jobType'] != ''){
            $sql .= " and circular.jobType = "."'".$jobType."'";
        }
        if($_POST['industryType'] != ''){
            $sql .= " and company_admin.industryType = ".$industryType;
        }       
        if($_POST['maxSalary'] != ''){
            $sql .= " and circular.salaryMax <= ".$maxSal;
        }
        if($_POST['minSalary'] != ''){
            $sql .= " and circular.salaryMin >= ".$minSal;
        }
        if($_POST['location'] != ''){
            $sql .= " and circular.location like "."'".$pattern."'";
        }
        
        
        $jobs = Circular::find_by_sql($sql);
       
      
        // $jobs = array_map('json_encode', $jobs);
        // $jobs = array_unique($jobs);
        // $jobs = array_map('json_decode', $jobs);
    } else {
        $jobs = Circular::find_all();
    }
?>
<link rel="stylesheet" href="../css/custom.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>search jobs</h2>
                </div>
            </div>
            <!-- End of Page Title -->

            

        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->





    <!-- ===== Start of Main Wrapper Section ===== -->
    <section class="search-jobs ptb80" id="version2">
        <div class="container">

            <!-- Start of Row -->
            <div class="row">

                <!-- ===== Start of Job Sidebar ===== -->
                <div class="col-md-4 col-xs-12 job-post-sidebar">
                    <form action="search-jobs.php" method="post">
                    <!-- Search Location -->
                    <div class="search-location">
                        <input type="text" name="location" class="form-control" placeholder="Location">
                    </div>

                    <!-- Job Types -->
                    <div class="job-categories mt30">
                        <h4 class="pb20">Industry Type</h4>
                        
                        <select name="industryType" class="selectpicker" id="search-categories" data-live-search="true" title="Any Category" data-size="5" data-container="body">
                        <?php foreach($industries as $industry) {?>
                            <option value="<?php echo $industry->id; ?>"><?php echo $industry->name; ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <!-- Job Types -->
                    <div class="job-categories mt30">
                        <h4 class="pb20">Job Type</h4>
                        
                        <select name="jobType" class="selectpicker" id="jobType" data-live-search="true"  data-size="5" data-container="body">
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-Time</option>
                            <option value="Contractual">Contractual</option>
                            <option value="Intern">Intern</option>
                        </select>
                    </div>
                    
                    <!-- Job Types -->
                    <div class="job-categories mt30">
                        <h4 class="pb20">Job Type</h4>
                        
                        <select name="jobLevel" class="selectpicker" id="jobLevel" data-live-search="true"  data-size="5" data-container="body">
                            <option value="Entry Level">Entry Level</option>
                            <option value="Intermediate Level">Intermediate Level</option>
                            <option value="Senior Level">Senior Level</option>
                        </select>
                    </div>

                    <!-- Search Location -->
                    <div class="job-categories mt30">
                        <h4 class="pb20">Max Salary</h4>
                        <input type="text" name="maxSalary" class="form-control" placeholder="">
                    </div>
                    
                    <!-- Search Location -->
                    <div class="job-categories mt30">
                        <h4 class="pb20">Min Salary</h4>
                        <input type="text" name="minSalary" class="form-control" placeholder="">
                    </div>
                    <div class="job-categories mt30">
                        <button type="submit" class="btn btn-primary" value="search" name="search" id="search">Search</button>
                    </div>
                    </form>         
                </div>
                <!-- ===== End of Job Sidebar ===== -->

                
                <!-- ===== Start of Job Post Main ===== -->
                <div class="col-md-8 col-xs-12 job-post-main">
                    <h4>We found <?php echo count($jobs);?> matches.</h4>

                    <!-- Start of Job Post Wrapper -->
                    <div class="job-post-wrapper mt20">
                        
                    <?php foreach($jobs as $job){ ?>
                            
                        <!-- ===== Start of Single Job Post 1 ===== -->
                        <div class="single-job-post row nomargin">
                            <!-- Job Company -->
                            <div class="col-md-2 col-xs-3 nopadding">
                                <div >
                                    <a href="<?php echo 'job-page.php?id='.$job->id;?>">
                                        <img style="width:85px" src="<?php echo '../images/company/'.$job->photo; ?>" alt="">
                                    </a>
                                </div>
                            </div>

                            <!-- Job Title & Info -->
                            <div class="col-md-8 col-xs-6 ptb20">
                                <div class="job-title">
                                    <a href="<?php echo 'job-page.php?id='.$job->id;?>"><?php echo $job->bannerText; ?></a>
                                </div>

                                <div class="job-info">
                                    <span class="company"><i class="fa fa-building-o"></i><?php echo $job->companyName; ?></span>
                                    <span class="location"><i class="fa fa-map-marker"></i><?php echo $job->location; ?></span>
                                </div>
                            </div>
                        
                            <!-- Job Category -->
                            <div class="col-md-2 col-xs-3 ptb30">
                                <div class="job-category">
                                    <a href="<?php echo 'job-page.php?id='.$job->id;?>" class="btn btn-green btn-small btn-effect">full time</a>
                                </div>
                            </div>
                        </div>
                        <!-- ===== End of Single Job Post 1 ===== -->

                    <?php } ?>    
                       
            
                    </div>
                    <!-- End of Job Post Wrapper -->

                    <!-- Start of Pagination -->
                    <!-- <ul class="pagination list-inline text-center">
                        <li class="active"><a href="javascript:void(0)">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">Next</a></li>
                    </ul> -->
                    <!-- End of Pagination -->

                </div>
                <!-- ===== End of Job Post Main ===== -->

            </div>
            <!-- End of Row -->

        </div>
    </section>
    <!-- ===== End of Main Wrapper Section ===== -->




<?php require_once('../layouts/seeker_footer.php'); ?>




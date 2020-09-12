<?php require_once('../layouts/seeker_header.php'); ?>


<?php

// 1. The current page number ($current_page)
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

// 2. Records per page ($per_page)
$per_page = 8;

// 3. Total record count ($total_count)
$total_count = Circular::count_all();

// find all photos
// $photos = Photograph::find_all();

$pagination = new Pagination($page, $per_page, $total_count);

// instead of finding all records, just find the records for this page

$sql = "SELECT circular.* from circular inner join applyTable on circular.id = applyTable.id where applyTable.aid = {$session->user_id} Limit {$per_page} OFFSET {$pagination->offset()}";
$jobs = Circular::find_by_sql($sql);

  // neet to add ?page=$page to all links we want to
  // maintain the current page (or store $page in session)

 ?>

    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header" id="find-candidate">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Applied Jobs</h2>
                </div>
            </div>
            <!-- End of Page Title -->


        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->


<link rel="stylesheet" href="../css/custom.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- ===== Start of Main Wrapper Section ===== -->
    <section class="find-candidate ptb80">
        <div class="container">

            <!-- Start of Form -->
            

            
            <!-- Start of Row -->
            <div class="row mt60">

                <!-- Start of Candidate Main -->
                <div class="col-md-12 candidate-main">

                    <!-- Start of Candidates Wrapper -->
                    <div class="candidate-wrapper">

                    <?php foreach($jobs as $job) {?>
                        <!-- ===== Start of Single Candidate 1 ===== -->
                        <div class="single-candidate row nomargin">

                            <!-- Candidate Image -->
                            <div class="col-md-2 col-xs-3">
                                <div class="candidate-img">
                                    <a href="<?php echo 'job-page.php?id='.$job->id;?>">
                                        <img src="<?php echo "../images/company/".$job->photo; ?>" class="img-responsive" alt="">
                                    </a>
                                </div>
                            </div>

                            <!-- Start of Candidate Name & Info -->
                            <div class="col-md-8 col-xs-6 ptb20">

                                <!-- Candidate Name -->
                                <div class="candidate-name">
                                    <a href="<?php echo 'job-page.php?id='.$job->id;?>"><h5 class="H3GREEN"><?php echo $job->companyName; ?></h5></a>
                                </div>

                                <!-- Candidate Info -->
                                <div class="candidate-info mt5">
                                    <ul class="list-inline">
                                        <li>
                                            <span><i class="fa fa-money"></i><?php echo $job->salaryMin." - ".$job->salaryMax; ?></span>
                                        </li>

                                        <li>
                                            <span><i class="fa fa-map-marker"></i><?php echo $job->location; ?></span>
                                        </li>

                                        <li>
                                            <span><i class="fa fa-briefcase"></i><?php echo $job->position; ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End of Candidate Name & Info -->
                        

                            

                        </div>
                        <!-- ===== End of Single Candidate 1 ===== -->
                    <?php } ?>

                    </div>
                    <!-- End of Candidates Wrapper -->

                    
                    <!-- Start of Pagination -->

                    <div class="col-md-12 mt10">
                    <ul class="pagination list-inline text-center">

                    <?php if($pagination->total_pages() > 1) { ?>
                            
                    <?php   if($pagination->has_previous_page()) { ?>
                        <li><a href="applied_jobs.php?page=<?php echo $pagination->previous_page();?>">Previous</a></li>
                    <?php } ?>

                    <?php   for($i=1; $i <= $pagination->total_pages(); $i++) {
                            if($i == $page) { ?>
                                <li class="active"><a href="javascript:void(0)"><?php echo $i; ?></a></li>
                    <?php   } else { ?>
                                <li><a href="applied_jobs.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            
                    <?php        }
                           } ?>

                    <?php   if($pagination->has_next_page()) { ?>
                        <li><a href="applied_jobs.php?page=<?php echo $pagination->next_page();?>">Next</a></li>
                            
                    <?php    } ?>

                    <?php    } ?>
                    </ul>
                    </div>
                    
                    <!-- End of Pagination -->

                </div>
                <!-- End of Candidate Main -->

            </div>
            <!-- End of Row -->

        </div>
    </section>
    <!-- ===== End of Main Wrapper Section ===== -->





    <?php require_once('../layouts/seeker_footer.php'); ?>
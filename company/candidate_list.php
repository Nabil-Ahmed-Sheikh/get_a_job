<?php require_once('../layouts/company_header.php'); ?>
<?php 
    // 1. The current page number ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    
    // 2. Records per page ($per_page)
    $per_page = 8;
    
    // 3. Total record count ($total_count)
    $total_count = Apply::count_by_uid($session->user_id);
    
    // find all photos
    // $photos = Photograph::find_all();
    
    $pagination = new Pagination($page, $per_page, $total_count);
    
    // instead of finding all records, just find the records for this page
    
    $sql = "SELECT * from applytable where uid = {$session->user_id} Limit {$per_page} OFFSET {$pagination->offset()}";
    $list = Apply::find_by_sql($sql);
    
      // neet to add ?page=$page to all links we want to
      // maintain the current page (or store $page in session)        
?>



    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header" id="find-candidate">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Candidate List</h2>
                </div>
            </div>
            <!-- End of Page Title -->


        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->





    <!-- ===== Start of Main Wrapper Section ===== -->
    <section class="find-candidate ptb80">
        <div class="container">

            <!-- Start of Form -->
            

            
            <!-- Start of Row -->
            <div class="row mt60">

                <!-- Start of Candidate Main -->
                <div class="col-md-12 candidate-main">
                <p class="h4"><?php echo $session->message; ?></p>

                    <!-- Start of Candidates Wrapper -->
                    <div class="candidate-wrapper">

                    <?php foreach($list as $item) {?>
                        <?php 
                            $personalInfo = PersonalInfo::find_by_id($item->aid);
                            $circular = Circular::find_by_id($item->id);
                        ?>
                        <!-- ===== Start of Single Candidate 1 ===== -->
                        <div class="single-candidate row nomargin">

                            <!-- Candidate Image -->
                            <div class="col-md-2 col-xs-3">
                                <div class="candidate-img">
                                    <a href="<?php echo 'candidate_profile.php?id='.$personalInfo->id;?>">
                                        <img src=<?php echo "../images/seeker/".$personalInfo->image; ?> class="img-responsive" alt="">
                                    </a>
                                </div>
                            </div>

                            <!-- Start of Candidate Name & Info -->
                            <div class="col-md-8 col-xs-6 ptb20">

                                <!-- Candidate Name -->
                                <div class="candidate-name">
                                    <a href="<?php echo 'candidate_profile.php?id='.$personalInfo->id;?>"><h5><?php echo $personalInfo->firstName." ".$personalInfo->lastName; ?></h5></a>
                                </div>

                                <!-- Candidate Info -->
                                <div class="candidate-info mt5">
                                    <ul class="list-inline">
                                        

                                        <li>
                                            <span><i class="fa fa-map-marker"></i><?php echo $personalInfo->currentAddress; ?></span>
                                        </li>

                                        <li>
                                            <span><i class="fa fa-briefcase"></i><?php echo $circular->position; ?></span>
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
                                <li><a href="candidate_list.php?page=<?php echo $pagination->previous_page();?>">Previous</a></li>
                            <?php } ?>

                            <?php   for($i=1; $i <= $pagination->total_pages(); $i++) {
                                    if($i == $page) { ?>
                                        <li class="active"><a href="javascript:void(0)"><?php echo $i; ?></a></li>
                            <?php   } else { ?>
                                        <li><a href="candidate_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    
                            <?php        }
                                    } ?>

                            <?php   if($pagination->has_next_page()) { ?>
                                <li><a href="candidate_list.php?page=<?php echo $pagination->next_page();?>">Next</a></li>
                                    
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





    <?php require_once('../layouts/company_footer.php'); ?>
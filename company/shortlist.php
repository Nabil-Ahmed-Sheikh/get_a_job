<?php require_once('../layouts/company_header.php'); ?>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<?php $recruiter =  CompanyAdmin::find_by_id($session->user_id); ?>  

<?php 
    $sql = "Select count(*) from personalinfo inner join exam_schedule 
            on personalinfo.id = exam_schedule.aid 
            where exam_schedule.stat = 'shortlisted'
            and exam_schedule.uid=".$session->user_id;
    

    // 1. The current page number ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

    // 2. Records per page ($per_page)
    $per_page = 8;
    
    // 3. Total record count ($total_count)
    $total_count = PersonalInfo::count_by_sql($sql);
    
    
    $pagination = new Pagination($page, $per_page, $total_count);
    
    // instead of finding all records, just find the records for this page
    $sql = "Select * from exam_schedule
            where exam_schedule.stat = 'shortlisted'
            and exam_schedule.uid = {$session->user_id} Limit {$per_page} OFFSET {$pagination->offset()}";
    $list = Schedule::find_by_sql($sql);
    
    
    
        // neet to add ?page=$page to all links we want to
        // maintain the current page (or store $page in session)  
        
?>



    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header" id="find-candidate">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Shortlisted Candidate</h2>
                </div>
            </div>
            <!-- End of Page Title -->


        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->





    <!-- ===== Start of Main Wrapper Section ===== -->
    <section class="find-candidate ptb80">
        <div class="container" style="min-height:35vh">

            <!-- Start of Form -->
            

            
            <!-- Start of Row -->
            <div class="row mt60">

                <!-- Start of Candidate Main -->
                <div class="col-md-12 candidate-main">
                <p class="h4"><?php echo $session->message; ?></p>

                    <!-- Start of Candidates Wrapper -->
                    <div class="candidate-wrapper">

                    <?php foreach($list as $schedule) {
                        
                        $item = PersonalInfo::find_by_id($schedule->aid);
                        $circular = Circular::find_by_id($schedule->cid);
                    
                    ?>
                    
                        <!-- ===== Start of Single Candidate 1 ===== -->
                        <div class="single-candidate row nomargin">

                            <!-- Candidate Image -->
                            <div class="col-md-2 col-xs-3">
                                <div class="candidate-img">
                                    <a href="<?php echo 'candidate_profile.php?id='.$item->id;?>">
                                        <img src=<?php echo "../images/seeker/".$item->image; ?> class="img-responsive" alt="">
                                    </a>
                                </div>
                            </div>

                            <!-- Start of Candidate Name & Info -->
                            <div class="col-md-8 col-xs-6 ptb20">

                                <!-- Candidate Name -->
                                <div class="candidate-name">
                                    <a href="<?php echo 'candidate_profile.php?id='.$item->id;?>"><h5><?php echo $item->firstName." ".$item->lastName; ?></h5></a>
                                </div>

                                <!-- Candidate Info -->
                                <div class="candidate-info mt5">
                                    <ul class="list-inline">
                                        

                                        <li>
                                            <span><i class="fa fa-map-marker"></i><?php echo $item->currentAddress; ?></span>
                                        </li>
                                        <li>
                                            <span><i class="fa fa-briefcase"></i><?php echo $circular->position; ?></span>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                            <!-- End of Candidate Name & Info -->

                            <div class="col-md-2 col-xs-3">
                                <div class="candidate-cta ptb30">
                                    <a href="candidate-profile-1.html" class="btn btn-blue btn-small btn-effect" 
                                        data-toggle="modal" data-target="<?php echo '#'.$schedule->id ?>" ><span><i class="fas fa-envelope"></i></span></a>
                                </div>
                            </div>

                            <div class="modal fade" id="<?php echo $schedule->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">Mailing</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../mailer.php" method="post">
                                        <input type="hidden" name="sender" value="<?php echo $recruiter->contactPersonEmail ?>">
                                        <input type="hidden" name="senderName" value="<?php echo $recruiter->companyName ?>">
                                        <input type="hidden" name="receiver" value="<?php echo $item->email?>">
                                        <input type="hidden" name="receiverName" value="<?php echo $item->firstName." ".$item->lastName; ?>">

                                        <h5 style="padding: 5px; font-weight: bold">Subject</h5>
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="eg. You are Shortlisted.">
                                        <h5 style="padding: 5px; font-weight: bold">Mail Body</h5>
                                        <textarea name="body" style="padding-bottom: 10px" id="body" class="form-control" cols="30" rows="10"></textarea>
                                        <script>
                                            CKEDITOR.replace( 'body' );
                                        </script>
                                        
                                        <br>
                                        <button type="submit" name="submit" class="btn btn-success">Send</button>
                                        </form>
                                    </div>
                                    
                                    </div>
                                </div>
                            </div>

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
                                <li><a href="shortlist.php?page=<?php echo $pagination->previous_page();?>">Previous</a></li>
                            <?php } ?>

                            <?php   for($i=1; $i <= $pagination->total_pages(); $i++) {
                                    if($i == $page) { ?>
                                        <li class="active"><a href="javascript:void(0)"><?php echo $i; ?></a></li>
                            <?php   } else { ?>
                                        <li><a href="shortlist.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    
                            <?php        }
                                    } ?>

                            <?php   if($pagination->has_next_page()) { ?>
                                <li><a href="shortlist.php?page=<?php echo $pagination->next_page();?>">Next</a></li>
                                    
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
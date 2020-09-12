<?php require_once('../layouts/company_header.php'); ?>
<?php 
    $list = Schedule::find_by_uid_and_stat($session->user_id, "'submitted'");

    // 1. The current page number ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

    // 2. Records per page ($per_page)
    $per_page = 8;
    
    // 3. Total record count ($total_count)
    $total_count = Schedule::count_by_uid_and_stat($session->user_id, "'submitted'");
    
    // find all photos
    // $photos = Photograph::find_all();
    
    $pagination = new Pagination($page, $per_page, $total_count);
    
    // instead of finding all records, just find the records for this page
    
    $sql = "SELECT * from exam_schedule where uid = {$session->user_id} and stat='submitted' Limit {$per_page} OFFSET {$pagination->offset()}";
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
                    <h2>Answer Paper List</h2>
                </div>
            </div>
            <!-- End of Page Title -->


        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->



<p class='h3'><?php echo $session->message;?></p>



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
                    
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Schduled Exam Date</th>
                            <th scope="col">Exam Name</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach($list as $item) {?>
                        <?php 
                            $pInfo = Personalinfo::find_by_id($item->aid);
                            $exam = Exam::find_by_id($item->eid);    
                        
                        ?>
                            <tr>
                            <th scope="row">1</th>
                            <td><?php echo $pInfo->firstName." ".$pInfo->lastName; ?></td>
                            <td><?php echo $item->lastDate; ?></td>
                            <td><?php echo $exam->name; ?></td>
                            <td>
                                <a href="answer_paper.php?id=<?php echo $item->id?>" class='btn btn-info' >Check</a>
                            </td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>

                    
                        


                    

                    </div>
                    <!-- End of Candidates Wrapper -->

                    <!-- Start of Pagination -->
                    <div class="col-md-12 mt10">
                        <ul class="pagination list-inline text-center">

                            <?php if($pagination->total_pages() > 1) { ?>
                                    
                            <?php   if($pagination->has_previous_page()) { ?>
                                <li><a href="answer_paper_list.php?page=<?php echo $pagination->previous_page();?>">Previous</a></li>
                            <?php } ?>

                            <?php   for($i=1; $i <= $pagination->total_pages(); $i++) {
                                    if($i == $page) { ?>
                                        <li class="active"><a href="javascript:void(0)"><?php echo $i; ?></a></li>
                            <?php   } else { ?>
                                        <li><a href="answer_paper_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    
                            <?php        }
                                    } ?>

                            <?php   if($pagination->has_next_page()) { ?>
                                <li><a href="answer_paper_list.php?page=<?php echo $pagination->next_page();?>">Next</a></li>
                                    
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
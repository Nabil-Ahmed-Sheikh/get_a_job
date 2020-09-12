<?php require_once('../layouts/company_header.php'); ?>
<?php
    
    // 1. The current page number ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    
    // 2. Records per page ($per_page)
    $per_page = 8;
    
    // 3. Total record count ($total_count)
    $total_count = Exam::count_by_uid($session->user_id);
    
    // find all photos
    // $photos = Photograph::find_all();
    
    $pagination = new Pagination($page, $per_page, $total_count);
    
    // instead of finding all records, just find the records for this page
    
    $sql = "SELECT * from exam where uid = {$session->user_id} Limit {$per_page} OFFSET {$pagination->offset()}";
    $list = Exam::find_by_sql($sql);
    
    // neet to add ?page=$page to all links we want to
    // maintain the current page (or store $page in session)        
   
?>





    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header" id="find-candidate">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Exam Paper List</h2>
                </div>
            </div>
            <!-- End of Page Title -->


        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->


<p class='h3'><?php echo $session->message;?></p>
    <div class="col text-center" style="padding:3%">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Exam
        </button>
        </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Exam Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="../includes/exam_handler.php" method='post'>
        <input type="hidden" name='uid' value='<?php echo $session->user_id; ?>' >
        <div class="form-group">
            <label for="name">Exam Name</label>
            <input type="text" class="form-control" id="name" name='name'  placeholder="Name of the exam">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name='description' placeholder="Description">
        </div>
        
        <button type="submit" name='add' value='add' class="btn btn-primary">Add</button>
        </form>

      </div>

    </div>
  </div>
</div>



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
                    
                    <?php foreach($list as $item) {?>
                        <!-- ===== Start of Single Candidate 2 ===== -->
                        <div class="single-candidate row nomargin">

                            <!-- Start of Candidate Name & Info -->
                            <div class="col-md-8 col-xs-6 ptb20">

                                <!-- Candidate Name -->
                                <div class="candidate-name">
                                    <a href="exam_papers.php?id=<?php echo $item->id;?>"><p class='h4'><?php echo $item->name; ?></p></a>
                                </div>

                                <!-- Candidate Info -->
                                <div class="candidate-info mt5">
                                    <p><?php echo $item->description; ?></p>
                                </div>
                            </div>
                            <!-- End of Candidate Name & Info -->

                            <!-- CTA -->
                            <div class="col-md-2 col-xs-3">
                                <form action="../includes/exam_handler.php" method="post">
                                <div class="candidate-cta ptb30">
                                    <button type="submit" class="btn btn-danger" name="delete" value=<?php echo $item->id;?> >X</button>
                                </div>
                                </form>
                            </div>

                        </div>
                        <!-- ===== End of Single Candidate 2 ===== -->
                    <?php } ?>

                    </div>
                    <!-- End of Candidates Wrapper -->

                    <!-- Start of Pagination -->
                    <div class="col-md-12 mt10">
                        <ul class="pagination list-inline text-center">

                            <?php if($pagination->total_pages() > 1) { ?>
                                    
                            <?php   if($pagination->has_previous_page()) { ?>
                                <li><a href="exam_paper_list.php?page=<?php echo $pagination->previous_page();?>">Previous</a></li>
                            <?php } ?>

                            <?php   for($i=1; $i <= $pagination->total_pages(); $i++) {
                                    if($i == $page) { ?>
                                        <li class="active"><a href="javascript:void(0)"><?php echo $i; ?></a></li>
                            <?php   } else { ?>
                                        <li><a href="exam_paper_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    
                            <?php        }
                                    } ?>

                            <?php   if($pagination->has_next_page()) { ?>
                                <li><a href="exam_paper_list.php?page=<?php echo $pagination->next_page();?>">Next</a></li>
                                    
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
<?php require_once('../layouts/company_header.php') ?>
<?php 
if(!isset($_GET['id'])){
   redirect_to('index.php') ;
} else {
    $eid = $_GET['id'];
    $exam = Exam::find_by_id($eid);
}

?>
<?php 
    $list = Set::find_by_eid($exam->id);
        
?>





    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header" id="find-candidate">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2><?php echo $exam->name ?></h2>
                </div>
            </div>
            <!-- End of Page Title -->


        </div>
    </section>
    <!-- =============== End of Page Header 1 Section =============== -->


<p class='h3'><?php echo $session->message;?></p>
    <div class="col text-center" style="padding:3%">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Question Set
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

      <form action="../includes/set_handler.php" method='post'>
        <input type="hidden" name='uid' value='<?php echo $session->user_id; ?>' >
        <div class="form-group">
            <label for="name">Set Name</label>
            <input type="text" class="form-control" id="name" name='name'  placeholder="Name of the question set">
        </div>
        <input type="hidden" name="eid" value="<?php echo $eid;?>">
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
                        <!-- ===== Start of Single set ===== -->
                        <div class="single-candidate row nomargin">

                            <!-- Start of set Name & Info -->
                            <div class="col-md-8 col-xs-6 ptb20">

                                <!-- set Name -->
                                <div class="candidate-name">
                                    <a href="question_paper.php?id=<?php echo $item->id;?>"><p class='h4'><?php echo $item->name; ?></p></a>
                                </div>

                                
                            </div>
                            <!-- End of set Name & Info -->

                            <!-- CTA -->
                            <div class="col-md-2 col-xs-3">
                                <form action="../includes/set_handler.php" method="post">
                                <div class="candidate-cta ptb30">
                                    <button type="submit" class="btn btn-danger" name="delete" value=<?php echo $item->id;?> >X</button>
                                </div>
                                </form>
                            </div>

                        </div>
                        <!-- ===== End of Single set  ===== -->
                    <?php } ?>

                    </div>
                    <!-- End of Candidates Wrapper -->

                    <!-- Start of Pagination -->
                    <!-- <div class="col-md-12 mt10">
                        <ul class="pagination list-inline text-center">
                            <li class="active"><a href="javascript:void(0)">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div> -->
                    <!-- End of Pagination -->

                </div>
                <!-- End of Candidate Main -->

            </div>
            <!-- End of Row -->

        </div>
    </section>
    <!-- ===== End of Main Wrapper Section ===== -->





    <?php require_once('../layouts/company_footer.php'); ?>
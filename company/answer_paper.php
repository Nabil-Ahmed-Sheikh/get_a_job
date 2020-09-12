<?php require_once('../layouts/company_header.php'); ?>
<?php 
if(isset($_GET['id'])){
    $list = Answer::find_by_scId($_GET['id']);
    if($list == []){
        redirct_to('answer_paper.php');
    }
} else {
    redirect_to('answer_paper_list.php');
}
?>
<?php 
        
?>





    <!-- =============== Start of Page Header 1 Section =============== -->
    <section class="page-header" id="find-candidate">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Answer Paper</h2>
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
               

                    <!-- Start of Candidates Wrapper -->
                    <div class="candidate-wrapper">
                    
                    <table class="table">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th scope="col">Question</th>
                            <th scope="col">Answer</th>
                            <th scope="col">Correct Answer</th>
                            <th scope="col">Remark</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php $count = 0; $score = 0?>
                        <?php foreach($list as $item) {?>
                        <?php 
                            $count++;
                            $ques= Question::find_by_id($item->qid);    
                        
                        ?>
                            <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $ques->question?></td>
                            <td><?php echo $item->ans; ?></td>
                            <td><?php echo $item->corrAns?></td>
                            <td>
                                <?php if($item->score == 0) { ?>
                                    <p style="color:red">Wrong</p>
                                <?php } else { ?>
                                    <p style="color:green">Correct</p>
                                <?php $score++; } ?>
                            </td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>

                    
                    <div class="col-md-12 mt10">
                        
                        <ul class="pagination list-inline text-center">
                            <li>
                                <h4>Score: <?php echo $score."/".$count; ?></h4>
                            </li>
                            <li>
                                <form action="../includes/answer_paper_handler.php" method="post">
                                    <button type="submit" class='btn btn-danger' name='reject' value='<?php echo $_GET['id']; ?>'>Reject</button>
                                </form>
                            </li>
                            <li>
                                <form action="../includes/answer_paper_handler.php" method="post">
                                    <button type="submit" class='btn btn-success' name='shortlist' value='<?php echo $_GET['id']; ?>'>Short List</button>
                                </form>
                            </li>
                        </ul>
                    </div>    
                        

                    

                    </div>
                    <!-- End of Candidates Wrapper -->

                    

                </div>
                <!-- End of Candidate Main -->

            </div>
            <!-- End of Row -->

        </div>
    </section>
    <!-- ===== End of Main Wrapper Section ===== -->





    <?php require_once('../layouts/company_footer.php'); ?>
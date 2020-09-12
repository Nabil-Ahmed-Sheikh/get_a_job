<?php require_once('initialize.php'); ?>

<?php
    if(isset($_POST['shortlist'])){
        Schedule::update_status($_POST['shortlist'], "'shortlisted'");
        $session->message('ShortListed!');
        redirect_to('../company/answer_paper_list.php');
        
    } elseif(isset($_POST['reject'])){
        Schedule::update_status($_POST['reject'], "'rejected'");
        $session->message('Rejected!');
        redirect_to('../company/answer_paper_list.php');


    } else {
        $session->message('Some thing went wrong!');
        redirect_to('../company/index.php');
    }


?>
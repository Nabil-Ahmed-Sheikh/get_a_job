<?php require_once('initialize.php'); ?>
<?php 
    if(isset($_POST['apply'])){
        $apply = new Apply();
        $apply->id = $_POST['id'];
        $apply->uid = $_POST['uid'];
        $apply->aid = $_POST['aid'];
        $apply->applyDate = $_POST['applyDate'];

        if( ($apply->id == '') || ($apply->uid == '') || ($apply->aid == '') || ($apply->applyDate == '') ) {
            $message = 'Something went wrong';
            
            redirect_to("../seeker/index.php");
        }

        if($apply->create()){
            $message = 'Applied';
            redirect_to('../seeker/search-jobs.php');
        } else {
            
            $message = 'Something went wrong';
            redirect_to("../seeker/index.php");
        }

    }
?>
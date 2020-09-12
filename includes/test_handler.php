<?php require_once('initialize.php');?>

<?php
   
    if(isset($_POST['submitted'])){
        

        for($i=0; $i< count($_POST['answer']); $i++ ){
            
            $answer = new Answer();
            $answer->id = Answer::get_max_id() + 1;
            $answer->ans = $_POST['answer'][$i];
            $answer->corrAns = $_POST['corrAns'][$i];
            $answer->qid = $_POST['qid'][$i];
            $answer->scId = $_POST['scId']; 
            $answer->submitDate = $_POST['submitDate'];

            if(($answer->qid == '') || ($answer->scId == '') || ($answer->submitDate == '')){
                continue;
            }

            if($answer->ans == ''){
                $answer->ans == ' ';
            }

            if($answer->ans == $answer->corrAns){
                $answer->score = 1;
            } else {
                $answer->score = 0;
            }

            
            if(!$answer->create()){
                $session->message('Something went wrong!');
                redirect_to('../seeker/take_test.php?id'.$answer->sid);
            }
            
            
        }
        $stat = "'submitted'";
        Schedule::update_status($_POST['scId'], $stat  );

        $session->message('Submitted');
        redirect_to('../seeker/exam_list.php');
        




    } else {
        redirect_to('../seeker/index.php');
    }
    
    

?>
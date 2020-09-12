<?php require_once('initialize.php'); ?>

<?php 

if(isset($_POST['add'])){
    
    
    if(($_POST['uid'] == '') || ($_POST['name'] == '') || ($_POST['eid'] == '')){
        $session->message('Set not created!');
        redirect_to('../company/exam_papers.php?id='.$eid);
    }
    
    $id = Set::get_max_id() + 1;
    $set = new Set();
    $set->id = $id;
    $set->uid = $_POST['uid'];
    $set->name = $_POST['name'];
    $set->eid = $_POST['eid'];


    if($set->create()){
        $session->message('Set created!');
        redirect_to('../company/exam_papers.php?id='.$set->eid);
    } else {
        $session->message('Set was not created!');
        redirect_to('../company/exam_papers.php?id='.$set->eid); 
    }

} elseif(isset($_POST['delete'])){
    try{
        Question::delete_by_sid($_POST['delete']);
    } catch(Exception $e){
        $session->message('Operation failed');
        redirect_to('../company/exam_papers.php?id='.$set->eid);
    }
    
    if($_POST['delete'] != ''){
        $set = Set::find_by_id($_POST['delete']);
        if($set->delete()){
            $session->message('Removed');
            redirect_to('../company/exam_papers.php?id='.$set->eid);   
        } else {
            $session->message('Operation failed');
            redirect_to('../company/exam_papers.php?id='.$set->eid); 
        }
    } else {
        redirect_to('../company/exam_papers.php?id='.$eid); 
    }
} else {
    redirect_to('../company/index.php');
}

?>
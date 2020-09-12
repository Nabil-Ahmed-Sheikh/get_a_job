<?php require_once('initialize.php'); ?>

<?php 

if(isset($_POST['add'])){
    
    
    if(($_POST['uid'] == '') || ($_POST['name'] == '')){
        $session->message('Exam was not created!');
        redirect_to('../company/exam_paper_list.php');
    }
    
    $id = Exam::get_max_id() + 1;
    $exam = new Exam();
    $exam->id = $id;
    $exam->uid = $_POST['uid'];
    $exam->name = $_POST['name'];
    $exam->description = $_POST['description'];

    if($exam->description == ''){
        $exam->description = "No description available ";
    }

    if($exam->create()){
        $session->message('Exam section is created!');
        redirect_to('../company/exam_paper_list.php');
    } else {
        $session->message('Exam creation was not created!');
        redirect_to('../company/exam_paper_list.php'); 
    }

} elseif(isset($_POST['delete'])){
    if($_POST['delete'] != ''){

        //Set::delete_by_eid($_POST['delete']);
        $exam = Exam::find_by_id($_POST['delete']);
        if($exam->delete_by_id($exam->id)){
            $session->message('Removed');
            redirect_to('../company/exam_paper_list.php');   
        } else {
            $session->message('Operation failed');
            redirect_to('../company/exam_paper_list.php'); 
        }
    } else {
        redirect_to('../company/exam_paper_list.php'); 
    }
} else {
    redirect_to('../company/index.php');
}

?>
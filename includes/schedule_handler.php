<?php require_once('initialize.php') ?>
<?php 
if(isset($_POST['add'])){
    
    if(($_POST['exam'] == '') || ($_POST['set'] == '') || ($_POST['uid'] == '') ||
        ($_POST['aid'] == '') || ($_POST['lastDate'] == '') || $_POST['stat'] == ''|| 
        ($_POST['startTime'] == '') || ($_POST['endTime'] == '') || ($_POST['circular'] == '')){
            $session->message('All Fields need to be filled!');
            redirect_to('../company/create_schedule.php');
        }
    if($_POST['startTime'] > $_POST['endTime']) {
        $session->message('End time cannot be earlier than start time');
        redirect_to('../company/create_schedule.php');
    }
    
    $schedule = new Schedule();
    $schedule->id = Schedule::get_max_id()+1;
    $schedule->eid = $_POST['exam'];
    $schedule->sid = $_POST['set'];
    $schedule->aid = $_POST['aid'];
    $schedule->uid = $_POST['uid'];
    $schedule->cid = $_POST['circular'];
    $schedule->stat = $_POST['stat'];
    $schedule->lastDate = $_POST['lastDate'];
    $schedule->startTime = $_POST['startTime'];
    $schedule->endTime = $_POST['endTime'];
    

    if($schedule->create()){
        $session->message('Schedule created!');
        redirect_to('../company/create_schedule.php');
    } else {
        $session->message('Schedule was not created!');
        redirect_to('../company/create_schedule.php'); 
    }
    
} elseif(isset($_GET['id'])){
    if($_GET['id'] != ''){
        
        $schedule = Schedule::find_by_id($_GET['id']);
        if($schedule->delete()){
            $session->message('Removed');
            redirect_to('../company/create_schedule.php');   
        } else {
            $session->message('Operation failed');
            redirect_to('../company/create_schedule.php'); 
        }
    }
} else {
    redirect_to('../company/create_schedule.php');
}

?>
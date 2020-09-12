<?php require_once('initialize.php'); ?>
<?php 
if(isset($_POST['submit'])) {
    if($_POST['username'] == '' || $_POST['email'] == '' || $_POST['password'] == '') {
            $session->message('Fill all the required fields');
            redirect_to('../index.php');
        }
    $seeker = new Seeker();
    
    $seeker->id = Seeker::get_max_id() + 1;
    $seeker->username = $_POST['username'];
    $seeker->email = $_POST['email'];
    $seeker->phoneNumber = $_POST['phoneNumber'];
    $seeker->password = $_POST['password'];
   
    
    if($seeker->phoneNumber == NULL) {
        $seeker->phoneNumber = 'N/A';
    }
    if($seeker->create()) {
        $session->message('Account Registered');
        redirect_to('../index.php');
    } else {
        $session->message('Account Could Not Be Registered');
        redirect_to('../index.php');
    }
    

} else {
    redirect_to('../index.php');
}


?>
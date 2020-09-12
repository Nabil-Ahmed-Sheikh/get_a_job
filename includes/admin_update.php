<?php require_once('initialize.php'); ?>
<?php if(!($session->is_logged_in() && $session->is_admin())){redirect_to('login.php');} ?>
<?php 
if(isset($_POST['changeInfo'])) {
    if($_POST['name'] == '' || $_POST['email'] == '' || $_POST['number'] == ''
    || $_POST['password'] == '' || $_POST['id'] == '') {
            $session->message('Cannot keep blank fields');
            redirect_to('../admin/update_profile.php');
        }
    $admin = new Admin();
    
    $admin->id = $_POST['id'];
    $admin->name = $_POST['name'];
    $admin->email = $_POST['email'];
    $admin->phoneNumber = $_POST['number'];
    $admin->password = $_POST['password'];

   
    if($admin->update()) {
        $session->message('Account Updated');
        redirect_to('../admin/update_profile.php');
    } else {
        $session->message('Account Could Not Be Updated');
        redirect_to('../admin/update_profile.php');
    }
    

} elseif(isset($_POST['changePassword'])){
    if(($_POST['oldPassword'] != '') && ($_POST['newPassword'] != '')){
        $changePassAdmin = Admin::find_by_id($session->user_id);
        
        if($_POST['oldPassword'] == $changePassAdmin->password ) {
            if(Admin::change_password($session->user_id, $_POST['newPassword'])){
                $session->message('Pasword Changed');
                redirect_to('../admin/update_profile.php');
            }
        } else {
            $session->message('Pasword Unchanged');
            redirect_to('../admin/update_profile.php');
        }
        
    }
}
 else {
    redirect_to('../admin/update_profile.php.php');
}

?>
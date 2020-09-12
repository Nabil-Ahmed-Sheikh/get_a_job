<?php require_once('initialize.php'); ?>
<?php 
if(!($session->is_logged_in() && $session->is_admin())){redirect_to('login.php');}
?>

<?php 
    if(isset($_POST['delete'])){
        if($_POST['delete'] == ''){
            $session->message('Something went wrong!');
            redirect_to('../admin/site_admin.php');
        }
        
        $admin = Admin::find_by_id($_POST['delete']);

        if($admin->delete()){
            $session->message('Deleted');
            redirect_to('../admin/site_admin.php');
        } else {
            $session->message('Failed to delete');
            redirect_to('../admin/site_admin.php');
        }
        
    } elseif (isset($_POST['add'])) {
        if($_POST['name'] == '' || $_POST['email'] == '' || $_POST['phoneNumber'] == '' || $_POST['password'] == '' ) {
            $session->message('All Fields Must Be Filled');
            redirect_to('../admin/site_admin.php'); 
        } 

        $admin = new Admin();
    
        $admin->id = Admin::get_max_id() + 1;
        $admin->name = $_POST['name'];
        $admin->email = $_POST['email'];
        $admin->phoneNumber = $_POST['phoneNumber'];
        $admin->password = $_POST['password'];

        if($admin->create()) {
            $session->message('Admin Registered');
            redirect_to('../admin/site_admin.php');
        } else {
            $session->message('Admin Could Not Be Registered');
            redirect_to('../admin/site_admin.php');
        }
       


    } else {
        redirect_to('../admin/index.php');
    }
?>
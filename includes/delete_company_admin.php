<?php require_once('initialize.php'); ?>
<?php 
if(!($session->is_logged_in() && $session->is_admin())){redirect_to('login.php');}
?>

<?php 
    if(isset($_POST['delete'])){
        if($_POST['delete'] == ''){
            $session->message('Something went wrong!');
            redirect_to('../admin/company_admin_list.php');
        }
        
        $admin = CompanyAdmin::find_by_id($_POST['delete']);

        if($admin->delete()){
            $session->message('Deleted');
            redirect_to('../admin/company_admin_list.php');
        } else {
            $session->message('Failed to delete');
            redirect_to('../admin/company_admin_list.php');
        }
        
    } else {
        redirect_to('../admin/index.php');
    }
?>
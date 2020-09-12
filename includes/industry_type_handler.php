<?php require_once('initialize.php'); ?>
<?php 
if(!($session->is_logged_in() && $session->is_admin())){redirect_to('login.php');}
?>

<?php 
    if(isset($_POST['edit'])){
        if($_POST['name'] == ''){
            $session->message('Name can not be blank');
            redirect_to('../admin/industry_list.php');
        }
        if($_POST['id'] == ''){
            $session->message('Something went wrong!');
            redirect_to('../admin/industry_list.php');
        }

        $industry = new IndustryType();

        $industry->id = $_POST['id'];
        $industry->name = $_POST['name'];
        $industry->description = $_POST['description'];

        if($industry->update()){
            $session->message('Updated');
            redirect_to('../admin/industry_list.php');
        } else {
            $session->message('Updated Not Possible');
            redirect_to('../admin/industry_list.php');
        }
        


    } elseif(isset($_POST['create'])){
        if($_POST['name'] == ''){
            $session->message('Name can not be blank');
            redirect_to('../admin/industry_list.php');
        }
        

        $industry = new IndustryType();

        $industry->id = $_POST['id'];
        $industry->name = $_POST['name'];
        $industry->description = $_POST['description'];

        if($industry->create()){
            $session->message('Added');
            redirect_to('../admin/industry_list.php');
        } else {
            $session->message('Action Not Possible');
            redirect_to('../admin/industry_list.php');
        }
    } else {
        redirect_to('../admin/index.php');
    }
?>
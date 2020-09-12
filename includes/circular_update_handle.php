<?php require_once('initialize.php'); ?>
<?php if(!$session->is_logged_in() || !$session->is_company_admin()){ redirect_to("../login.php"); } ?>

<?php
	
if(isset($_POST['update'])) {
    if( ($_POST['position'] == '') || ($_POST['bannerText'] == '') || ($_POST['id'] == '') || ($_POST['uid'] == '') ||
     ($_POST['companyName'] == '') || ($_POST['location'] == '') || ($_POST['deadline'] == '')){
        $session->message("Fill the required Fields");
        redirect_to('../company/circular_list.php');
    } else {
    
    $oldImage = Circular::find_by_id($_POST['id'])->photo;
    //saving image
    if($_FILES['image']['name'] != ""){
        
        $max_file_size = 1048576;  
        $filename = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $size = $_FILES['image']['size'];
        $extention = explode(".", $filename);
        $type = strtolower(end($extention));
        $allowedTypes = array('jpg', 'jpeg', 'png');
        
        if(in_array($type, $allowedTypes)){
            if($size <= $max_file_size) {
                $fileNameNew = uniqid('', true).".".$type;
                $fileDestination = '../images/company/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            }
        }
        
        $address = $fileNameNew;
    } else {
        $address = $oldImage;
    }


    
    $circular = new Circular();
    $circular->id = $_POST['id'];
    $circular->uid = $_POST['uid'];
    $circular->position = $_POST['position'];
    $circular->bannerText = $_POST['bannerText'];
    $circular->companyName = $_POST['companyName'];
    $circular->location = $_POST['location'];
    $circular->deadline = $_POST['deadline'];
    $circular->jobLevel = $_POST['jobLevel'];
    $circular->jobType = $_POST['jobType'];
    $circular->vacancy = $_POST['vacancy'];
    $circular->salaryMin = $_POST['salaryMin'];
    $circular->salaryMax = $_POST['salaryMax'];
    $circular->postDate = $_POST['postDate'];
    $circular->photo = $address;
    $circular->description = $_POST['desc'];
    $circular->experienceRequired = $_POST['experienceRequired'];

    

    if($_POST['vacancy'] == ''){
        $circular->vacancy = 1;
    }
    if($_POST['salaryMax'] == ''){
        $circular->salaryMax = 0;
    }
    if($_POST['salaryMin'] ==''){
        $circular->salaryMin = 0;
    }
    if($_POST['desc'] == ''){
        $circular->description = ' ';
    }

    
        if($circular->update()){
            unlink(SITE_ROOT.DS."images".DS."company".DS.$oldImage);
            $session->message("Circular updated");
            redirect_to('../company/circular_list.php');
        } else {
            if($address != $oldImage){
                unlink(SITE_ROOT.DS."images".DS."company".DS.$address);
            }
            $session->message("Something went wrong!");
            redirect_to('../company/circular_list.php');
        }
    }


} elseif(isset($_POST['delete'])){
    if($_POST['id'] != ''){
        $id = $_POST['id'];
        $circular = Circular::find_by_id($id);
        if(Apply::delete_by_id($circular->id)){
            if($circular->delete()){
                unlink($circular->photo); 
                $session->message("Post Deleted");
                redirect_to('../company/circular_list.php');
            }else {
                $session->message("Post could not be deleted");
                redirect_to('../company/circular_list.php');
            }
        }else {
            $session->message("Post could not be deleted");
            redirect_to('../company/circular_list.php');
        }    
    } else {
        $session->message("Post could not be deleted");
        redirect_to('../company/circular_list.php');
    }
} else {
    redirect_to('../company/circular_list.php');
}
?>
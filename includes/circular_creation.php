<?php require_once('initialize.php'); ?>
<?php if(!$session->is_logged_in() || !$session->is_company_admin()){ redirect_to("../login.php"); } ?>

<?php
	
if(isset($_POST['submit'])) {
    
    if( ($_POST['position'] == '') || ($_POST['bannerText'] == '') ||
     ($_POST['companyName'] == '') || ($_POST['location'] == '') || ($_POST['deadline'] == '')){
        $session->message("Fill the required Fields");
        redirect_to('../company/create_circular.php');
    } else {

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
        $session->message("Image is missing");
        redirect_to('../company/create_circular.php');
    }


    $maxId = Circular::get_max_id();
    $circular = new Circular();
    $circular->id = $maxId + 1;
    $circular->uid = $session->user_id;
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


        if($circular->create()){
            $session->message ("Circular created");
            redirect_to('../company/index.php');
        } else {
            unlink(SITE_ROOT.DS."images".DS."company".DS.$address);
            $$session->message("Something went wrong!");
            redirect_to('../company/create_circular.php');
        }
    }


} else {
    redirect_to('../company/create_circular.php');
}
	
?>
<?php require_once('../includes/initialize.php'); ?>
<?php if(!$session->is_logged_in()){ redirect_to("login.php"); } ?>
<?php 



if($_POST['submit'] == 'create') {
    if( ($_POST['firstName'] == '') || ($_POST['lastName'] == '') ||
     ($_POST['email'] == '') || ($_POST['phoneNumber1'] == '') || ($_POST['currentAddress'] == '') ||
      ($_POST['dateOfBirth'] == '')){
        $sesion->message ("Fill the required Fields");
        redirect_to('../seeker/submit-resume.php');
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
                    $fileDestination = '../images/seeker/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                }
            }
            
            $address = $fileNameNew;

            
            $personalInfo = new PersonalInfo();

            $personalInfo->id = $_POST['id'];
            $personalInfo->dateOfBirth = $_POST['dateOfBirth'];
            $personalInfo->firstName = $_POST['firstName'];
            $personalInfo->lastName = $_POST['lastName'];
            $personalInfo->fatherName = $_POST['fatherName'];
            $personalInfo->motherName = $_POST['motherName'];
            $personalInfo->currentAddress = $_POST['currentAddress'];
            $personalInfo->permanentAddress = $_POST['permanentAddress'];
            $personalInfo->phoneNumber1 = $_POST['phoneNumber1'];
            $personalInfo->phoneNumber2 = $_POST['phoneNumber2'];
            $personalInfo->email = $_POST['email'];
            $personalInfo->alternativeEmail = $_POST['alternativeEmail'];
            $personalInfo->passportNumber = $_POST['passportNumber'];
            $personalInfo->passportIssueDate = $_POST['passportIssueDate'];
            $personalInfo->photo = $address;
            $personalInfo->nationality = $_POST['nationality'];
            $personalInfo->nid = $_POST['nid'];
            $personalInfo->maritalStatus = $_POST['maritalStatus'];
            $personalInfo->image = $address;

            if($personalInfo->passportNumber == '' || $personalInfo->passportIssueDate='') {
                $personalInfo->passportNumber = 'N/A';
                $personalInfo->passportIssueDate = '1960-01-01';
            }
            if($personalInfo->phoneNumber2 == '') {
                $personalInfo->phoneNumber2 = 'N/A';
            }
            if($personalInfo->alternativeEmail == '') {
                $personalInfo->alternativeEmail = 'N/A';
            }
            if($personalInfo->nationality == '') {
                $personalInfo->nationality = 'N/A';
                $personalInfo->nid = 'N/A';
            }
            if($personalInfo->nid == '') {
                $personalInfo->nid = 'N/A';
            }
            if($personalInfo->fatherName == '') {
                $personalInfo->fatherName = 'N/A';
            }
            if($personalInfo->motherName == '') {
                $personalInfo->motherName = 'N/A';
            }
            if($personalInfo->permanentAddress == '') {
                $personalInfo->permanentAddress = 'N/A';
            }

            if($personalInfo->create()){
                $session->message('Personal informations uploaded');
                redirect_to('../seeker/submit-resume.php');
            } else {
                unlink($fileDestination);
                $session->message('Something went wrong');
                redirect_to('../seeker/submit-resume.php');
            }

        }else {
            $session->message("Image need to create CV");
            redirect_to('../seeker/submit-resume.php');
        }

    }
} elseif ($_POST['submit'] == 'update') {

    $prevInfo = PersonalInfo::find_by_id($session->user_id);

    if( ($_POST['firstName'] == '') || ($_POST['lastName'] == '') ||
     ($_POST['email'] == '') || ($_POST['phoneNumber1'] == '') || ($_POST['currentAddress'] == '') ||
      ($_POST['dateOfBirth'] == '')){
        $message = "Fill the required Fields";
        redirect_to('../seeker/submit-resume.php');
    } else {
        
        //saving image
        if($_FILES['image']['name'] != ""){
            unlink(SITE_ROOT.DS."images".DS."seeker".DS.$prevInfo->image);
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
                    $fileDestination = "../images/seeker/".$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                }
            }
            
            $address = $fileNameNew;
        }else {
            $address = $prevInfo->image;
        }
            
        $personalInfo = new PersonalInfo();

        $personalInfo->id = $_POST['id'];
        $personalInfo->dateOfBirth = $_POST['dateOfBirth'];
        $personalInfo->firstName = $_POST['firstName'];
        $personalInfo->lastName = $_POST['lastName'];
        $personalInfo->fatherName = $_POST['fatherName'];
        $personalInfo->motherName = $_POST['motherName'];
        $personalInfo->currentAddress = $_POST['currentAddress'];
        $personalInfo->permanentAddress = $_POST['permanentAddress'];
        $personalInfo->phoneNumber1 = $_POST['phoneNumber1'];
        $personalInfo->phoneNumber2 = $_POST['phoneNumber2'];
        $personalInfo->email = $_POST['email'];
        $personalInfo->alternativeEmail = $_POST['alternativeEmail'];
        $personalInfo->passportNumber = $_POST['passportNumber'];
        $personalInfo->passportIssueDate = $_POST['passportIssueDate'];
        $personalInfo->photo = $address;
        $personalInfo->nationality = $_POST['nationality'];
        $personalInfo->nid = $_POST['nid'];
        $personalInfo->maritalStatus = $_POST['maritalStatus'];
        $personalInfo->image = $address;

        if($personalInfo->passportNumber == '' || $personalInfo->passportIssueDate='') {
            $personalInfo->passportNumber = 'N/A';
            $personalInfo->passportIssueDate = '1960-01-01';
        }
        if($personalInfo->phoneNumber2 == '') {
            $personalInfo->phoneNumber2 = 'N/A';
        }
        if($personalInfo->alternativeEmail == '') {
            $personalInfo->alternativeEmail = 'N/A';
        }
        if($personalInfo->nationality == '') {
            $personalInfo->nationality = 'N/A';
            $personalInfo->nid = 'N/A';
        }
        if($personalInfo->nid == '') {
            $personalInfo->nid = 'N/A';
        }
        if($personalInfo->fatherName == '') {
            $personalInfo->fatherName = 'N/A';
        }
        if($personalInfo->motherName == '') {
            $personalInfo->motherName = 'N/A';
        }
        if($personalInfo->permanentAddress == '') {
            $personalInfo->permanentAddress = 'N/A';
        }

        if($personalInfo->update()){
            $message = 'Personal informations updated';
            redirect_to('../seeker/submit-resume.php');
        } else {
            unlink($fileDestination);
            $message = 'Something went wrong';
            redirect_to('../seeker/submit-resume.php');
        }

    }

} else {
    redirect_to('../seeker/submit-resume.php');
}
?>
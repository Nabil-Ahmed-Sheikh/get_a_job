<?php require_once('initialize.php'); ?>
<?php 

if(isset($_POST['submit'])) {
    if($_POST['contactPersonName'] == '' || $_POST['contactPersonEmail'] == '' || $_POST['companyName'] == '' 
        || $_POST['password'] == '') {
            $session->message('Fill all the required fields');
            redirect_to('../register.php');
        }
    $company_admin = new CompanyAdmin();
    
    $company_admin->id = CompanyAdmin::get_max_id() + 1;
    $company_admin->contactPersonName = $_POST['contactPersonName'];
    $company_admin->contactPersonDesignation = $_POST['contactPersonDesignation'];
    $company_admin->contactPersonEmail = $_POST['contactPersonEmail'];
    $company_admin->contactPersonNumber = $_POST['contactPersonNumber'];
    $company_admin->password = $_POST['password'];
    $company_admin->companyName = $_POST['companyName'];
    $company_admin->industryType = $_POST['industryType'];
    $company_admin->websiteURL = $_POST['websiteURL'];
    $company_admin->businessDescription = $_POST['businessDescription'];

    if($company_admin->contactPersonDesignation == NULL) {
        $company_admin->contactPersonDesignation = 'NA';
    }
    if($company_admin->websiteURL == NULL) {
        $company_admin->websiteURL = 'NA';
    }
    if($company_admin->contactPersonNumber == NULL) {
        $company_admin->contactPersonNumber = 'NA';
    }
    if($company_admin->businessDescription == NULL) {
        $company_admin->businessDescription = 'NA';
    }
    if($company_admin->create()) {
        $session->message('Account Registered');
        redirect_to('../index.php');
    } else {
        
        $session->message('Account Could Not Be Registered');
        redirect_to('../register.php');
    }
    

} else {
    
    redirect_to('../register.php');
}


?>
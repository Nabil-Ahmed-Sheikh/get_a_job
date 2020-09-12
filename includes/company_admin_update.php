<?php require_once('initialize.php'); ?>
<?php 
if(isset($_POST['submit'])) {
    if($_POST['contactPersonName'] == '' || $_POST['contactPersonEmail'] == '' || $_POST['companyName'] == '') {
            $session->message('Cannot keep blank required fields');
            redirect_to('../company/update_profile.php');
        }
    $company_admin = new CompanyAdmin();
    
    $company_admin->id = $_POST['id'];
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
    if($company_admin->update()) {
        $session->message('Account Updated');
        redirect_to('../company/update_profile.php');
    } else {
        // var_dump($company_admin);
        // exit;
        $session->message('Account Could Not Be Updated');
        redirect_to('../company/update_profile.php');
    }
    

} elseif(isset($_POST['changePassword'])){
    if(($_POST['oldPassword'] != '') && ($_POST['newPassword'] != '')){
        $changePassAdmin = CompanyAdmin::find_by_id($session->user_id);
        
        if($_POST['oldPassword'] == $changePassAdmin->password ) {
            if(CompanyAdmin::change_password($session->user_id, $_POST['newPassword'])){
                $session->message('Pasword Changed');
                redirect_to('../company/update_profile.php');
            }
        } else {
            $session->message('Pasword Unchanged');
            redirect_to('../company/update_profile.php');
        }
        
    }
}
 else {
    redirect_to('../company/update_profile.php.php');
}

?>
<?php include('initialize.php'); ?>
<?php 

    
    //Form with name submit
  if(isset($_POST['submit'])){
    
    $email = trim($_POST['cemail']);
    $password = trim($_POST['cpassword']);
    
  
  // check db if user exists
  $found_user = CompanyAdmin::authenticate($email, $password);
    if($found_user){
      $session->login($found_user, 'company_admin');
      redirect_to("../company/index.php");
    }
    else{
      $session->message("Username/Password combination not correct");
      redirect_to("../index.php");
    }
  }
  else{
    
    redirect_to("../index.php");
  }

?>


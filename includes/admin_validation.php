<?php include('initialize.php'); ?>
<?php 

    
    //Form with name submit
  if(isset($_POST['submit'])){
    
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
  
  // check db if user exists
  $found_user = Admin::authenticate($email, $password);
    if($found_user){
      $session->login($found_user, 'admin');
      redirect_to("../admin/index.php");
    }
    else{
      $session->message("Username/Password combination not correct");
      redirect_to("../admin/login.php");
    }
  }
  else{
    
    redirect_to("../index.php");
  }

?>


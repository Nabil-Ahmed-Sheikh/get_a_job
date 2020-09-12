<?php include('initialize.php'); ?>
<?php 
    
    //Form with name submit
  if(isset($_POST['submit'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

  
  // check db if user exists
  $found_user = Seeker::authenticate($email, $password);
    if($found_user){
      $session->login($found_user, 'seeker');
      redirect_to("../seeker/index.php");
    }
    else{
      $message = "Username/Password combination not correct";
      redirect_to("../index.php");
    }
  }
  else{
    redirect_to("../index.php");
  }

?>


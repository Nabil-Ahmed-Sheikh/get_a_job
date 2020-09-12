
<?php
class Session{
  private $logged_in = false;
  public $user_type;
  public $user_id;
  public $message;
  
  function __construct(){
    session_start();
    $this->check_login();
    $this->check_message();
  }
  
  public function is_logged_in(){
    return $this->logged_in;
  }

  public function is_company_admin(){
	  if ( $this->user_type == 'company_admin') {
      return true;
    }
    return false;
  }

  public function is_admin(){
    
	  if ( $this->user_type == 'admin') {
      return true;
    }
    return false;
  }
  
  public function login($user, $userType){
    if($user){
	  $this->user_id = $_SESSION['user_id'] = $user->id;
    $this->user_type = $_SESSION['user_type'] = $userType;
    $this->logged_in = true;
    }
  }
  
  public function logout(){
    unset($_SESSION['user_id']);
    unset($this->user_id);
    $this->logged_in = false;
  }
  
  public function message($msg = ""){
    if(!empty($msg)){
      $_SESSION["message"] = $msg;
    }
    else{
      return $this->message;
    }
  }
  
  private function check_login(){
    if(isset($_SESSION['user_id'])){
      $this->user_id = $_SESSION['user_id'];
      $this->logged_in = true;
      $this->user_type = $_SESSION['user_type'];
    }
    else{
      unset($this->user_id);
      $this->logged_in = false;
    }
  }
  
  private function check_message(){
    if(isset($_SESSION["message"])){
      $this->message = $_SESSION["message"];
      unset($_SESSION["message"]);
    }
    else{
      $this->message = "";
    }
  }
}

$session = new Session();
$message = $session->message();
?>
<?php
error_reporting(E_ERROR | E_PARSE);
//Define the core paths
//Define them as absolute paths to make sire that require_once works as expected

//DIRECTORY_SEPARATOR is a PHP pre-defined constant
//(\ for Windows, / for Unix)
defined('DS') ? null: define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null :
	define('SITE_ROOT', DS.'Xampp'.DS.'htdocs'.DS.'get_a_job');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

//load config file first
require_once(LIB_PATH.DS."config.php");

//load basic functions next so that everything after can use them
require_once(LIB_PATH.DS."functions.php");

//load core objects
require_once(LIB_PATH.DS."session.php");
require_once(LIB_PATH.DS."database.php");


//load database-related classes
require_once(LIB_PATH.DS."company_admin.php");
require_once(LIB_PATH.DS."seeker.php");
require_once(LIB_PATH.DS."industry_type.php");
require_once(LIB_PATH.DS."circular.php");
require_once(LIB_PATH.DS."employment.php");
require_once(LIB_PATH.DS."apply.php");
require_once(LIB_PATH.DS."set.php");
// require_once(LIB_PATH.DS."applyCircular.php");
// require_once(LIB_PATH.DS."comment.php");

//Pagination
require_once(LIB_PATH.DS."pagination.php");


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
//require 'vendor/autoload.php';



?>

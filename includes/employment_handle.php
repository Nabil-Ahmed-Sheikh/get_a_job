<?php require_once('initialize.php');?>
<?php 
    if (isset($_POST['submit'])) {
 
        $id = Employment::get_max_id()+1;
        
        $employment = new Employment();
        $employment->id = $id;
        $employment->uid = $_POST['uid'];
        $employment->companyName = $_POST['companyName'];
        $employment->location = $_POST['location'];
        $employment->department = $_POST['department'];
        $employment->designation = $_POST['designation'];
        $employment->responsibility = $_POST['responsibility'];
        $employment->workedFrom = $_POST['workedFrom'];
        $employment->workedTill = $_POST['workedTill'];
        

        if(($employment->uid == '') || ($employment->companyName == '') || 
        ($employment->designation == '') || ($employment->workedFrom == '')) {
            $message = 'Fill required Fields';
            redirect_to('../seeker/submit-resume.php');
        }

        if($employment->workedTill == ''){
            $employment->workedTill = '2100-01-01';
        }
        if($employment->location == ""){
            $employment->location = "N/A"; 
        }
        if($employment->department == ""){
            $employment->department = "N/A";
        }

        if($employment->create()) {
            $message = 'Added';
            redirect_to('../seeker/submit-resume.php');
        } else {
            $message = 'Cannot be added';
            redirect_to('../seeker/submit-resume.php');
        }
        
    }elseif(isset($_POST['delete'])){
        $employment = Employment::find_by_id($_POST['delete']);
        if($employment->delete()){
            $message = 'Removed';
            redirect_to('../seeker/submit-resume.php');  
        } else {
            $message = 'Soething went wrong';
            redirect_to('../seeker/submit-resume.php');
        }
    } else {
        
        redirect_to('../index.php');
    }
?>

<script>

</script>
<?php require_once('initialize.php');?>
<?php 
    if (isset($_POST['submit'])) {
        $id = Education::get_max_id()+1;
        
        $education = new Education();
        $education->id = $id;
        $education->uid = $_POST['uid'];
        $education->institution = $_POST['institutionName'];
        $education->passYear = $_POST['passYear'];
        $education->degreeTitle = $_POST['degreeTitle'];
        $education->division = $_POST['division'];
        $education->cgpa = $_POST['cgpa'];
        $education->scale = $_POST['scale'];
        $education->degreeLevel = $_POST['degreeLevel'];

        if(($education->uid == '') || ($education->institution == '') || 
        ($education->passYear == '') || ($education->degreeTitle == '')   || ($education->degreeLevel == '')) {
            $message = 'Fill required Fields';
            redirect_to('../seeker/submit-resume');
        }

        if($education->create()) {
            $message = 'Added';
            redirect_to('../seeker/submit-resume.php');
        } else {
            $message = 'Cannot be added';
            redirect_to('../seeker/submit-resume.php');
        }
        
    }elseif(isset($_POST['delete'])){
        $education = Education::find_by_id($_POST['delete']);
        if($education->delete()){
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
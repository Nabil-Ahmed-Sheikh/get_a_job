<?php require_once('initialize.php');?>
<?php 
    if (isset($_POST['submit'])) {
 
        $id = Skill::get_max_id()+1;
        
        $skill = new Skill();
        $skill->id = $id;
        $skill->uid = $_POST['uid'];
        $skill->skillName = $_POST['skillName'];
        $skill->percentage = $_POST['percentage'];
        
        
        
        if(($skill->uid == '') || ($skill->skillName == '') || 
        ($skill->percentage == '')) {
            $message = 'Fill required Fields';
            redirect_to('../seeker/submit-resume.php');
        }

        

        if($skill->create()) {
            $message = 'Added';
            redirect_to('../seeker/submit-resume.php');
        } else {
            $message = 'Cannot be added';
            redirect_to('../seeker/submit-resume.php');
        }
        
    }elseif(isset($_POST['delete'])){
        $skill = Skill::find_by_id($_POST['delete']);
        if($skill->delete()){
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

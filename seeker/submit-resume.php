<?php require_once('../layouts/seeker_header.php'); ?>

<!-- =============== Start of Page Header 1 Section =============== -->
<section class="page-header">
    <div class="container">

        <!-- Start of Page Title -->
        <div class="row">
            <div class="col-md-12">
                <h2>Resume</h2>
            </div>
        </div>
        <!-- End of Page Title -->


    </div>
</section>
<!-- =============== End of Page Header 1 Section =============== -->


    <!-- ===== Start of Main Wrapper Section ===== -->
<?php $user_id = $session->user_id;
echo $message;
if(!PersonalInfo::find_by_id($user_id)){ ?>

<br>

<div class='container' style=" min-height: 48vh">
<?php   require_once('personalInfo_create_form.php'); ?>    
</div>
<?php
} else {
    require_once('personalInfo_update_form.php');
    
    require_once('education_list.php');

    require_once('employment_list.php');

    require_once('skill_list.php');
?>

<?php    
}
?>    


    <!-- ===== End of Main Wrapper Section ===== -->
</div>

<?php require_once("../layouts/seeker_footer.php"); ?>




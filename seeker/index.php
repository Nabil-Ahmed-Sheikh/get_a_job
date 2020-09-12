<?php require_once('../layouts/seeker_header.php'); ?>
<?php $user = PersonalInfo::find_by_id($session->user_id); ?>
    <!-- ===== Start of Main Search Section ===== -->
    <section class="main overlay-black" style="background-image: url('../images/img/new.jpg')">

        <!-- Start of Wrapper -->
        <div class="container wrapper">
            <h1 class="capitalize text-center text-white">your career starts now</h1>



        </div>
        <!-- End of Wrapper -->

    </section>
    <!-- ===== End of Main Search Section ===== -->





<?php require_once("../layouts/seeker_footer.php"); ?>

<?php include('../layouts/company_header.php'); ?>
<?php echo $message; ?>
<?php $user = CompanyAdmin::find_by_id($session->user_id); ?>


    <!-- ===== Start of Main Search Section ===== -->
    <section class="main overlay-black" style="background-image: url('../images/img/new.jpg')">

        <!-- Start of Wrapper -->
        <div class="container wrapper" >
            <h1 class="capitalize text-center text-white">Welcome <?php echo $user->contactPersonName;?></h1>

           

        </div>
        <!-- End of Wrapper -->

    </section>
    <!-- ===== End of Main Search Section ===== -->



<?php include('../layouts/company_footer.php'); ?>

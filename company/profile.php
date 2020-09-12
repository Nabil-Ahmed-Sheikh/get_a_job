<?php require_once('../layouts/company_admin_header.php') ?>

<?php 
$industryTypes = industryType::find_all();
$user = CompanyAdmin::find_by_id($session->user_id); 
$chosenIndustruType = industryType::find_by_id($user->industryType);

?> 



<div class='container'>
<h1>Edit Profile</h1>
<?php echo $message; ?>
 <form class="form-horizontal" action="../includes/company_admin_update.php" method="post">
        <input type="hidden" name='id' value='<?php echo $user->id; ?>'>
        <input type="hidden" name='password' value='<?php echo $user->password ?>'>

    <div class="form-group">
        <label class="control-label col-sm-2" for="contactPersonName">Name<span class="required">*</span></label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name='contactPersonName' value='<?php echo $user->contactPersonName  ;?>'> 
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="contactPersonDesignation">Designation</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name='contactPersonDesignation' value='<?php echo $user->contactPersonDesignation  ;?>'>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="contactPersonEmail">Email<span class="required">*</span></label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name='contactPersonEmail' value='<?php echo $user->contactPersonEmail  ;?>'>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="contactPersonNumber">Phone Number</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name='contactPersonNumber' value='<?php echo $user->contactPersonNumber  ;?>'>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="companyName">Company Name<span class="required">*</span></label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name='companyName' value='<?php echo $user->companyName ;?>'>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="industryType">Industry Type</label>
        <div class="col-sm-4">
            <select id="industryType" class="form-control" name="industryType">
                <option value='<?php echo $chosenIndustruType->id ;?>'><?php echo $chosenIndustruType->name ;?></option>
                <?php foreach($industryTypes as $industryType) { ?>
                <option value="<?php echo ($industryType->id); ?>"><?php echo ($industryType->name); ?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="businessDescription">Business Description</label>
        <div class="col-sm-6">
            <textarea name="businessDescription" class="form-control" id="businessDescription" cols="30" rows="3" ><?php echo $user->businessDescription  ;?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="websiteURL">Website</label>
        <div class="col-sm-6">
            <input type="text" name='websiteURL' class="form-control" value='<?php echo $user->websiteURL ;?>'>
        </div>
    </div>

        <button type='submit' name='submit' class='btn btn-primary' value='submit'>Update</button>
</body>
</html> 
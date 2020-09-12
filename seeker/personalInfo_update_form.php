<?php 
    $personalInfo = PersonalInfo::find_by_id($user_id);
?>
<br>
<div class='container' style="border:1px solid; padding=10px" >
<p class="h1">Personal Info</p>
        
      
    <form action="../includes/personal_info_handle.php" method="post" enctype="multipart/form-data">

        <input type="hidden" value="<?php echo $user_id; ?>" name="id">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label  for="firstName">First Name<span class="required" style='color:red;'>*</span></label>
                <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $personalInfo->firstName; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="lastName">Last Name<span class="required" style='color:red;'>*</span></label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $personalInfo->lastName; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="dateOfBirth">Date of Birth<span class="required" style='color:red;'>*</span></label>
            <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" value="<?php echo $personalInfo->dateOfBirth; ?>">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="fatherName">Father's Name</label>
                <input type="text" class="form-control" id="fatherName" name="fatherName" value="<?php echo $personalInfo->fatherName; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="motherName">Mother's Name</label>
                <input type="text" class="form-control" id="motherName" name="motherName" value="<?php echo $personalInfo->motherName; ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label for="currentAddress">Current Address<span class="required" style='color:red;'>*</span></label>
            <input type="text" class="form-control" id="currentAddress" name="currentAddress" value="<?php echo $personalInfo->currentAddress; ?>">
        </div>
        <div class="form-group">
            <label for="permanentAddress">Permanent Address</label>
            <input type="text" class="form-control" id="permanentAddress" name="permanentAddress" value="<?php echo $personalInfo->permanentAddress; ?>">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="passportNumber">Passport Number</label>
                <input type="text" class="form-control" id="passportNumber" name="passportNumber" value="<?php echo $personalInfo->passportNumber; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="passportIssueDate">Passport Issue Date</label>
                <input type="date" class="form-control" id="passportIssueDate" name="passportIssueDate" value="<?php echo $personalInfo->passportIssueDate; ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="phoneNumber1">Phone Number 1<span class="required" style='color:red;'>*</span></label>
                <input type="text" class="form-control" id="phoneNumber1" name="phoneNumber1" value="<?php echo $personalInfo->phoneNumber1; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="phoneNumber2">Phone Number 2</label>
                <input type="text" class="form-control" id="phoneNumber2" name="phoneNumber2" value="<?php echo $personalInfo->phoneNumber2; ?>">
            </div>
        </div>
        

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nationality">Nationality</label>
                <input type="text" class="form-control" id="nationality" name="nationality" value="<?php echo $personalInfo->nationality; ?>">
            </div>
            
            <div class="form-group col-md-6">
                <label for="nid">National Id Number</label>
                <input type="text" class="form-control" id="nid" name="nid" value="<?php echo $personalInfo->nid; ?>">
            </div>
            
        </div>
        

        <div class="form-group">
            <label for="email">Email Address<span class="required" style='color:red;'>*</span></label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $personalInfo->email; ?>">
        </div>
        <div class="form-group">
            <label for="alternativeEmail">Alternative Email Address</label>
            <input type="text" class="form-control" id="alternativeEmail" name="alternativeEmail" value="<?php echo $personalInfo->alternativeEmail; ?>">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="image">Photo<span class="required" style='color:red;'>*</span></label>
                <img src=<?php echo ($personalInfo->image_path()); ?> style="width:50px;" alt="">
                <input type="file" class="form-control" id="image" name="image" ?> 
            </div>
            <div class="form-group col-md-6">
                <label for="maritalStatus">Marital Status</label>
                <select id="maritalStatus" name="maritalStatus" class="form-control">
                    <option selected value="<?php echo $personalInfo->maritalStatus; ?>"><?php echo $personalInfo->maritalStatus; ?></option>
                    <option value='married'>Unmarried</option>
                    <option value='married'>Married</option>
                </select>
            </div>
        </div>

        <div class="col text-center">
        <button type="submit" class="btn btn-primary" value="update" name="submit">Save Personal Info Changes</button>
        </div>
        <br>
        
    </form>
    
</div>
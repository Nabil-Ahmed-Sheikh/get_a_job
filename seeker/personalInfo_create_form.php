<div class='container'>
    <div class="col text-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#personalInfoModal">
        Create Your Resume
        </button>
    </div>

<div class="modal fade" id="personalInfoModal" tabindex="-1" role="dialog" aria-labelledby="personalModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Personal Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form action="../includes/personal_info_handle.php" method="post" enctype="multipart/form-data">

        <input type="hidden" value="<?php echo $user_id; ?>" name="id">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label  for="firstName">First Name<span class="required" style='color:red;'>*</span></label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
            </div>
            <div class="form-group col-md-6">
                <label for="lastName">Last Name<span class="required" style='color:red;'>*</span></label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
            </div>
        </div>

        <div class="form-group">
            <label for="dateOfBirth">Date of Birth<span class="required" style='color:red;'>*</span></label>
            <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="fatherName">Father's Name</label>
                <input type="text" class="form-control" id="fatherName" name="fatherName" placeholder="Father's Name">
            </div>
            <div class="form-group col-md-6">
                <label for="motherName">Mother's Name</label>
                <input type="text" class="form-control" id="motherName" name="motherName" placeholder="Mother's Name">
            </div>
        </div>
        
        <div class="form-group">
            <label for="currentAddress">Current Address<span class="required" style='color:red;'>*</span></label>
            <input type="text" class="form-control" id="currentAddress" name="currentAddress" placeholder="">
        </div>
        <div class="form-group">
            <label for="permanentAddress">Permanent Address</label>
            <input type="text" class="form-control" id="permanentAddress" name="permanentAddress" placeholder="">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="passportNumber">Passport Number</label>
                <input type="text" class="form-control" id="passportNumber" name="passportNumber" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="passportIssueDate">Passport Issue Date</label>
                <input type="date" class="form-control" id="passportIssueDate" name="passportIssueDate" placeholder=" ">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="phoneNumber1">Phone Number 1<span class="required" style='color:red;'>*</span></label>
                <input type="text" class="form-control" id="phoneNumber1" name="phoneNumber1" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="phoneNumber2">Phone Number 2</label>
                <input type="text" class="form-control" id="phoneNumber2" name="phoneNumber2" placeholder="">
            </div>
        </div>
        

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nationality">Nationality</label>
                <input type="text" class="form-control" id="nationality" name="nationality" placeholder=" ">
            </div>
            
            <div class="form-group col-md-6">
                <label for="nid">National Id Number</label>
                <input type="text" class="form-control" id="nid" name="nid" placeholder="">
            </div>
            
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="image">Photo<span class="required" style='color:red;'>*</span></label>
                <input type="file" class="form-control" id="image" name="image" >
            </div>
            <div class="form-group col-md-6">
                <label for="maritalStatus">Marital Status</label>
                <select id="maritalStatus" name="maritalStatus" class="form-control">
                    <option selected value='Unmarried'>Unmarried</option>
                    <option value='married'>Married</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email Address<span class="required" style='color:red;'>*</span></label>
            <input type="text" class="form-control" id="email" name="email" placeholder="">
        </div>
        <div class="form-group">
            <label for="alternativeEmail">Alternative Email Address</label>
            <input type="text" class="form-control" id="alternativeEmail" name="alternativeEmail" placeholder="">
        </div>


        <button type="submit" class="btn btn-primary" value="create" name="submit">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </form>
    </div>
  </div>

</div>
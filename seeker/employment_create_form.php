<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <div class="col text-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employmentModal">
        Add Employent History
        </button>
    </div>

<div class="modal fade" id="employmentModal" tabindex="-1" role="dialog" aria-labelledby="employmentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employmentModalLabel">Employment History</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form action="../includes/employment_handle.php" method="post" id="educationCreateForm">

        <input type="hidden" value="<?php echo $user_id; ?>" name="uid" id="uid">
                                  
        <div class="form-row">
            <div class="form-group">
                <label  for="companyName">Company Name<span class="required" style='color:red;'>*</span></label>
                <input type="text" class="form-control" id="companyName" name="companyName" placeholder="">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label  for="companyAddress">Company Addrsess</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="">
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="department">Department</label>
                <input type="text" class="form-control" id="department" name="department" placeholder="eg. R&D">
            </div>
            <div class="form-group col-md-6">
                <label for="designation">Designation<span class="required" style='color:red;'>*</span></label>
                <input type="text" class="form-control" id="designation" name="designation" placeholder="eg. Software Engineer ">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="workedFrom">Worked From<span class="required" style='color:red;'>*</span></label>
                <input type="date" class="form-control" id="workedFrom" name="workedFrom" >
            </div>
            <div class="form-group col-md-6">
                <label for="workedTill">Worked Till</label>
                <input type="date" class="form-control" id="workedTill" name="workedTill" >
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="responsibility">Responsibility </label>
            <div class="col-sm-10">
                <textarea name="responsibility"></textarea>
                <script>
                    CKEDITOR.replace( 'responsibility' );
                </script>
            </div>
        </div>

        


        <button type="submit" class="btn btn-primary" value="create" name="submit" id="submit">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </form>
    </div>
  </div>
</div>
</div>



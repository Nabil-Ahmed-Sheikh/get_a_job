<div class='container'>
    <div class="col text-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#skillModal">
        Add Skill
        </button>
    </div>

<div class="modal fade" id="skillModal" tabindex="-1" role="dialog" aria-labelledby="skillLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Skill Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form action="../includes/skill_handle.php" method="post" enctype="multipart/form-data">

        <input type="hidden" value="<?php echo $user_id; ?>" name="uid">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label  for="skillName">Skill Name<span class="required" style='color:red;'>*</span></label>
                <input type="text" class="form-control" id="skillName" name="skillName" placeholder="eg. Python">
            </div>
            <div class="form-group col-md-6">
                <label for="percentage">Skill in percentage<span class="required" style='color:red;'>*</span></label>
                <input type="text" class="form-control" id="percentage" name="percentage" placeholder="80">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" value="create" name="submit">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </form>
    </div>
  </div>

</div>
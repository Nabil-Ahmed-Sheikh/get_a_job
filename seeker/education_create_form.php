
    <div class="col text-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#educationModal">
        Add Educational Qualification
        </button>
    </div>

<div class="modal fade" id="educationModal" tabindex="-1" role="dialog" aria-labelledby="educationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="educationModalLabel">Educational Qualification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form action="../includes/education_handle.php" method="post" id="educationCreateForm" >

        <input type="hidden" value="<?php echo $user_id; ?>" name="uid" id="uid">
                                  
        <div class="form-row">
            <div class="form-group">
                <label  for="degreeTitle">Degree Name<span class="required" style='color:red;'>*</span></label>
                <input type="text" class="form-control" id="degreeTitle" name="degreeTitle" placeholder="eg. Bsc in Economics">
            </div>
        </div>

        <div class="form-group">
            <label for="passYear">Year of passing<span class="required" style='color:red;'>*</span></label>
            <input type="date" class="form-control" id="passYear" name="passYear" placeholder="">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="institutionName">Name of institution<span class="required" style='color:red;'>*</span></label>
                <input type="text" class="form-control" id="institutionName" name="institutionName" placeholder="eg. Oxford University">
            </div>
        </div>
        


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="cgpa">CGPA</label>
                <input type="text" class="form-control" id="cgpa" name="cgpa" placeholder="eg. 3.33">
            </div>
            <div class="form-group col-md-6">
                <label for="scale">Scale</label>
                <input type="text" class="form-control" id="scale" name="scale" placeholder="eg. 4.0 ">
            </div>
        </div>


        <div class="form-row">
          <div class="form-group col-md-6">
                <label for="division">Divison</label>
                <select id="division" name="division" class="form-control">
                    <option selected value='First Divison'>N/A</option>
                    <option value='First Divison'>First Divison</option>
                    <option value='Second Division'>Second Division</option>
                    <option value='Third Division'>Third Division</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="degreeLevel">Level of Education</label>
                <select id="degreeLevel" name="degreeLevel" class="form-control">
                    <option selected value='Secondary Eduaction'>Secondary Eduaction</option>
                    <option value='Higher Secondary Eduaction'>Higher Secondary Eduaction</option>
                    <option value='Diploma'>Diploma</option>
                    <option value='Bachelors'>Bachelors</option>
                    <option value='Masters'>Masters</option>
                    <option value='PhD'>PhD</option>
                    <option value='Postdoc'>Postdoc</option>
                </select>
            </div>
        </div>



        <button type="submit" class="btn btn-primary" value="create" name="submit" id="submit">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </form>
    </div>
  </div>


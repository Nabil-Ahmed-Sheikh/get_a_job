<?php include('../layouts/company_header.php') ?>


 <div class='container'>
 <form class="form-horizontal" action="../includes/circular_creation.php" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label class="control-label col-sm-2" for="position">Position:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="position" name="position" placeholder="Position Title">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="bannerText">Banner Text:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="bannerText" name="bannerText" placeholder="Text on the banner">
    </div>
  </div>
        
  <div class="form-group">
    <label class="control-label col-sm-2" for="companyName">Company Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Name of the hiring company">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="loacation">Location:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="location" name="location" placeholder="Location">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="deadline">Dead Line:</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="deadline" name="deadline" >
    </div>
  </div>

  <div class="form-group">
    <label for="jobLevel" class="control-label col-sm-2">Job Level:</label>
    <div class="col-sm-2">
        <select class="form-control" id="jobLevel" name="jobLevel">
        <option value="Entry Level">Entry Level</option>
        <option value="Intermediate Level">Intermediate Level</option>
        <option value="Senior Level">Senior Level</option>
    </select>
  </div>

        <label for="jobType" class="control-label col-sm-2">Job Type:</label>
        <div class="col-sm-2">
            <select class="form-control" id="jobType" name="jobType">
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-Time</option>
                <option value="Contractual">Contractual</option>
                <option value="Intern">Intern</option>
            </select>
        </div>

     
        <label class="control-label col-sm-2" for="vacancy">Vacancy:</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="vacancy" name="vacancy" placeholder="Number of vacancy">
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-2" for="salaryMin">Salary Range:</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="salaryMin" name="salaryMin" placeholder="Min">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="salaryMax" name="salaryMax" placeholder="Max">
        </div>

        <label for="experiencedRequired" class="control-label col-sm-2">Experienced Required:</label>
        <div class="col-sm-2">
            <select class="form-control" id="experienceRequired" name="experienceRequired">
                <option value="0">N/A</option>
                <option value=".5">0 - 6 months</option>
                <option value="1">1 year</option>
                <option value="2">2 years</option>
                <option value="3">3 years</option>
                <option value="5">5 years or more</option>
                <option value="10">10 years or more</option>
            </select>
        </div>
    </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="image">Image:</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="image" name="image">
    </div>
  </div>
  <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
  

  <div class="form-group">
    <label class="control-label col-sm-2" for="desc">Description:</label>
    <div class="col-sm-10">
        <textarea name="desc"></textarea>
        <script>
            CKEDITOR.replace( 'desc' );
        </script>
    </div>
  </div>

  <input type="hidden" name="postDate" value="<?php echo(date("Y-m-d")); ?>" >
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </div>
  </div>
  
</form>

<?php require_once('../layouts/company_footer.php'); ?>
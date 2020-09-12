<?php 
ob_start();
include('../layouts/company_header.php') ?>
<?php 
    if(isset($_POST['update'])){
        if($_POST['id'] != ''){
            $id = $_POST['id'];
            $circular = Circular::find_by_id($id);
            
        } else {
            redirect_to("../company/circular_list.php");
        }
    }else {
        echo "yo";
        redirect_to("../company/circular_list.php");
    }
?>

 <div class='container'>
 <form class="form-horizontal" action="../includes/circular_update_handle.php" method="post" enctype="multipart/form-data">

  <input type="hidden" name="id" value="<?php echo $circular->id; ?>">  
  <input type="hidden" name="uid" value="<?php echo $circular->uid; ?>">  
  <div class="form-group">
    <label class="control-label col-sm-2" for="position">Position:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="position" name="position" value="<?php echo $circular->position; ?>" placeholder="Position Title">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="bannerText">Banner Text:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="bannerText" name="bannerText" value="<?php echo $circular->bannerText; ?>" placeholder="Text on the banner">
    </div>
  </div>
        
  <div class="form-group">
    <label class="control-label col-sm-2" for="companyName">Company Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="companyName" name="companyName" value="<?php echo $circular->companyName; ?>" placeholder="Name of the hiring company">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="loacation">Location:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="location" name="location" value="<?php echo $circular->location; ?>" placeholder="Location">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="deadline">Dead Line:</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="deadline" name="deadline" value="<?php echo $circular->deadline; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="jobLevel" class="control-label col-sm-2">Job Level:</label>
    <div class="col-sm-2">
        <select class="form-control" id="jobLevel" name="jobLevel">
        <option value="<?php echo $circular->jobLevel; ?>"><?php echo $circular->jobLevel; ?></option>
        <option value="Entry Level">Entry Level</option>
        <option value="Intermediate Level">Intermediate Level</option>
        <option value="Senior Level">Senior Level</option>
    </select>
  </div>

        <label for="jobType" class="control-label col-sm-2">Job Type:</label>
        <div class="col-sm-2">
            <select class="form-control" id="jobType" name="jobType">
                <option value="<?php echo $circular->companyName; ?>"><?php echo $circular->jobType; ?></option>
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-Time</option>
                <option value="Contractual">Contractual</option>
                <option value="Intern">Intern</option>
            </select>
        </div>

     
        <label class="control-label col-sm-2" for="vacancy">Vacancy:</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" id="vacancy" name="vacancy" value="<?php echo $circular->vacancy; ?>" placeholder="Number of vacancy">
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-2" for="salaryMin">Salary Range:</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="salaryMin" name="salaryMin" value="<?php echo $circular->salaryMin; ?>" placeholder="Min">
        </div>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="salaryMax" name="salaryMax" value="<?php echo $circular->salaryMax; ?>" placeholder="Max">
        </div>

        <label for="experienceRequired" class="control-label col-sm-2">Experienced Required:</label>
        <div class="col-sm-2">
            <select class="form-control" id="experienceRequired" name="experienceRequired">
                <option value="<?php echo $circular->experienceRequired; ?>"><?php echo $circular->experienceRequired; ?></option>
                <option value="0">N/A</option>
                <option value=".5">6 months</option>
                <option value="1">1 year</option>
                <option value="2">2 years</option>
                <option value="3">3 years</option>
                <option value="5">5 years or more</option>
                <option value="10">10 years or more</option>
            </select>
        </div>
    </div>

    
    <div class='container' style="padding-left:17%;padding-bottom:3%">
         <img style="width:100px;" src="<?php echo '../images/company/'.$circular->photo; ?>" alt="">
    </div>

  
  <div class="form-group">
    
    <label class="control-label col-sm-2" for="image">Company Logo:</label>
    
    <div class="col-sm-10">
      <input type="file" class="form-control" id="image" name="image" value="<?php echo $circular->photo; ?>">
    </div>
  </div>
  <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  

  <div class="form-group">
    <label class="control-label col-sm-2" for="desc">Description:</label>
    <div class="col-sm-10">
        <textarea name="desc"><?php echo $circular->description; ?></textarea>
        <script>
            CKEDITOR.replace( 'desc' );
        </script>
    </div>
  </div>

  <input type="hidden" name="postDate" value="<?php echo(date("Y-m-d")); ?>" >
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="update" value="update" class="btn btn-primary">
    </div>
  </div>
  
</form>

<?php require_once('../layouts/company_footer.php'); ?>
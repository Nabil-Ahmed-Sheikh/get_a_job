<?php require_once('../layouts/company_header.php');?>
<?php 
    $exams = Exam::find_by_uid($session->user_id);
?>

<?php 
    
?>

<?php 
    $circulars = Circular::find_by_uid($session->user_id);
?>

<?php 
    // 1. The current page number ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
    
    // 2. Records per page ($per_page)
    $per_page = 10;
    
    // 3. Total record count ($total_count)
    $total_count = Schedule::count_by_uid($session->user_id);
    
    // find all photos
    // $photos = Photograph::find_all();
    
    $pagination = new Pagination($page, $per_page, $total_count);
    
    // instead of finding all records, just find the records for this page
    
    $sql = "SELECT * from exam_schedule where uid = {$session->user_id} Limit {$per_page} OFFSET {$pagination->offset()}";
    $schedules = Schedule::find_by_sql($sql);
    
    // neet to add ?page=$page to all links we want to
    // maintain the current page (or store $page in session)        
?>


<section class="page-header" id="find-candidate">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Exam Schedule</h2>
                </div>
            </div>
            <!-- End of Page Title -->


        </div>
</section>

<p class='h3'><?php echo $session->message;?></p>


<div class="col text-center" style="padding:3%">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Schedule
        </button>
        </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Exam Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="../includes/schedule_handler.php" method='post'>

            

        <div class="form-group">
            <label for="name">Exam Name</label>
            <select class="form-control" name="exam" id="exam">
                <option value=""></option>
                <?php foreach($exams as $exam){?>
                <option value="<?php echo $exam->id; ?>"><?php echo $exam->name; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="name">Set Name</label>
            <select  class="form-control" name="set" id="set">
            </select>
        </div>
        
        <div class="form-group">
            <label for="name">Circular</label>
            <select class="form-control" name="circular" id="circular">
                <option value=""></option>
                <?php foreach($circulars as $circular){?>
                <option value="<?php echo $circular->id; ?>"><?php echo $circular->position; ?></option>
                <?php } ?>
            </select>
        </div>

      
        <input type="hidden" name='uid' value='<?php echo $session->user_id; ?>' >
        
        <div class="form-group">
            <label for="aid">Candidate</label>
            <select class="form-control" name="aid" id="aid">
            </select>
        </div>

        <div class="form-group">
            <label for="lastdate">Date</label>
            <input type="date" class="form-control" id="lastDate" name='lastDate' placeholder="">
        </div>
        <div class="form-group">
            <label for="lastdate">Start Time</label>
            <input type="time" class="form-control" id="startTime" name='startTime' placeholder="">
        </div>
        <div class="form-group">
            <label for="lastdate">End Time</label>
            <input type="time" class="form-control" id="endTime" name='endTime' placeholder="">
        </div>
        <input type="hidden" name="stat" value='created' id="">
        <button type="submit" name='add' value='add' class="btn btn-primary">Add</button>
        </form>

      </div>

    </div>
  </div>
</div>




    <section class="find-candidate ptb80">
        <div class="container">

            <!-- Start of Form -->
            

            
            <!-- Start of Row -->
            <div class="row mt60">

                <!-- Start of Candidate Main -->
                <div class="col-md-12 candidate-main">
               

                    <!-- Start of Candidates Wrapper -->
                    <div class="candidate-wrapper">
                    </div>
                </div>
            </div>
        </div>
    </section>


<div class='container'>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Exam Name</th>
      <th scope="col">Set</th>
      <th scope="col">Exam Date</th>
      <th scope="col">Status</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($schedules as $schedule){ ?>
        <?php $pInfo = PersonalInfo::find_bY_id($schedule->aid); ?>
        <?php $st = Set::find_by_id($schedule->sid); ?>
        <?php $ex = Exam::find_by_id($schedule->eid); ?>
    <tr>
      <td ><?php echo $pInfo->firstName." ".$pInfo->lastName; ?></th>
      <td><?php echo $ex->name; ?></td>
      <td><?php echo $st->name; ?></td>
      <td><?php echo $schedule->lastDate; ?></td>
      <td><?php echo $schedule->stat ?></td>
      <td>
        <a class='btn btn-danger' href="../includes/schedule_handler.php?id=<?php echo $schedule->id; ?>">X</a>
      </td>
    </tr>

    <?php } ?>
  </tbody>
</table>
</div>

<div class="container" style="padding-bottom:15px">
<!-- Start of Pagination -->
<div class="col-md-12 mt10">
    <ul class="pagination list-inline text-center">

        <?php if($pagination->total_pages() > 1) { ?>
                
        <?php   if($pagination->has_previous_page()) { ?>
            <li><a href="create_schedule.php?page=<?php echo $pagination->previous_page();?>">Previous</a></li>
        <?php } ?>

        <?php   for($i=1; $i <= $pagination->total_pages(); $i++) {
                if($i == $page) { ?>
                    <li class="active"><a href="javascript:void(0)"><?php echo $i; ?></a></li>
        <?php   } else { ?>
                    <li><a href="create_schedule.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                
        <?php        }
                } ?>

        <?php   if($pagination->has_next_page()) { ?>
            <li><a href="create_schedule.php?page=<?php echo $pagination->next_page();?>">Next</a></li>
                
        <?php    } ?>

        <?php    } ?>
    </ul>
</div>
 <!-- End of Pagination -->
</div>




<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

<script>
$('#exam').change(function(){
    var ex = $('#exam').val() 

    $.ajax({
        type : 'GET',
        url: '../includes/changer_api.php?id='+ex,
        success: function(data){
            data = JSON.parse(data);
            $('#set').empty();
            for(var i = 0; i<data.length; i++){
                $('#set').append('<option value='+data[i].id +'>'+data[i].name+'</option>');

            }
            
        }
    });
})

</script>

<script>
$('#circular').change(function(){
    var ex = $('#circular').val() 

    $.ajax({
        type : 'GET',
        url: '../includes/changer_api.php?cid='+ex,
        success: function(data){
            data = JSON.parse(data);
            $('#aid').empty();
            for(var i = 0; i<data.length; i++){
                console.log(data[i]);
                $('#aid').append('<option value='+data[i].id +'>'+data[i].firstName+" "+data[i].lastName+'</option>');

            }
            
        }
    });
})
</script>


<?php require_once('../layouts/company_footer.php'); ?>

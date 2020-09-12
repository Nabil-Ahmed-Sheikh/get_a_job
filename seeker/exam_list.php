<?php require_once('../layouts/seeker_header.php');?>
<?php 
$tz = 'Asia/Dhaka';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
// echo $dt->format('d.m.Y, H:i:s');
date_default_timezone_set("Asia/Dhaka");
?>

<?php

// 1. The current page number ($current_page)
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

// 2. Records per page ($per_page)
$per_page = 15;

// 3. Total record count ($total_count)
$total_count = Schedule::count_by_aid($session->user_id);

// find all photos
// $photos = Photograph::find_all();

$pagination = new Pagination($page, $per_page, $total_count);

// instead of finding all records, just find the records for this page

$sql = "SELECT exam_schedule.* from exam_schedule where exam_schedule.aid = {$session->user_id} Limit {$per_page} OFFSET {$pagination->offset()}";
$schedules = Schedule::find_by_sql($sql);

  // neet to add ?page=$page to all links we want to
  // maintain the current page (or store $page in session)
?>




<section class="page-header" id="find-candidate">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Exams</h2>
                </div>
            </div>
            <!-- End of Page Title -->


        </div>
</section>

<p class='h3'><?php echo $session->message;?></p>





<div class='container' style="min-height:55vh">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Exam Name</th>
      <th scope="col">Set</th>
      <th scope="col">Exam Date</th>
      <th scope="col">Exam Time</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($schedules as $schedule){ ?>
        <?php $st = Set::find_by_id($schedule->sid); ?>
        <?php $ex = Exam::find_by_id($schedule->eid); ?>
    <tr>
      <td><?php echo $ex->name; ?></td>
      <td><?php echo $st->name; ?></td>
      <td><?php echo ($schedule->lastDate); ?></td>
      <td><?php echo $schedule->startTime." - ".$schedule->endTime; ?></td>
      <td>
      <?php if(($schedule->stat == 'created')){?>
        <a class="btn 
                  btn-danger 
                  <?php
                  if( !((strtotime($schedule->lastDate." ".$schedule->endTime) >= strtotime(date("Y-m-d H:i:s")))
                      && (strtotime($schedule->lastDate." ".$schedule->startTime) <= strtotime(date("Y-m-d H:i:s"))) ) ){
                    echo "disabled";
                  }
                  ?>
                  " href="take_test.php?id=<?php echo $schedule->id; ?>">Take Test
        </a>
      <?php } elseif($schedule->stat == 'submitted') { ?>
        <a class="btn btn-info disabled" >Submitted</a>
        <?php } elseif($schedule->stat == 'shortlisted') { ?>
        <a class="btn btn-success disabled">Shortlisted</a>
        <?php } elseif($schedule->stat == 'rejected') { ?>
        <a class="btn btn-warning disabled">Rejected</a>
        <?php } ?>
      </td>
    </tr>

    <?php } ?>
  </tbody>
</table>

<div class="col-md-12 mt10">
  <ul class="pagination list-inline text-center">

    <?php if($pagination->total_pages() > 1) { ?>
            
    <?php   if($pagination->has_previous_page()) { ?>
        <li><a href="exam_list.php?page=<?php echo $pagination->previous_page();?>">Previous</a></li>
    <?php } ?>

    <?php   for($i=1; $i <= $pagination->total_pages(); $i++) {
            if($i == $page) { ?>
                <li class="active"><a href="javascript:void(0)"><?php echo $i; ?></a></li>
    <?php   } else { ?>
                <li><a href="exam_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            
    <?php        }
            } ?>

    <?php   if($pagination->has_next_page()) { ?>
        <li><a href="exam_list.php?page=<?php echo $pagination->next_page();?>">Next</a></li>
            
    <?php    } ?>

    <?php    } ?>
  </ul>
</div>
</div>
























<?php require_once('../layouts/seeker_footer.php'); ?>

<?php require_once('../includes/initialize.php'); ?>
<?php 
    if(isset($_GET['id'])){
        $schedule = Schedule::find_by_id($_GET['id']);
        if($schedule->stat != 'created') {
            redirect_to('index.php');
        }
        $set = Set::find_by_id($schedule->sid);
        $exam = Exam::find_by_id($schedule->eid);
        $questions = Question::find_by_sid($set->id);
       
        if(($schedule->stat != 'created')){
           redirect_to('index.php');
        }
    } else {
        redirect_to('index.php');
    }
?>
<?php require_once('../layouts/seeker_header.php'); ?>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

<section class="page-header" id="find-candidate">
        <div class="container">

            <!-- Start of Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <h3><?php echo $exam->name." - Set:".$set->name ;?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5 id='counter'></h5>
                </div>
            </div>
            <!-- End of Page Title -->


        </div>
</section>





    <!-- ===== Start of Main Wrapper Job Section ===== -->
    <section class="ptb80" id="job-page">
        <div class="container" id='form' style="visibility:hidden">

            <form action="../includes/test_handler.php" method='post' id="answerForm" name="answerForm">
            <?php $count = 0 ?>
            <?php foreach($questions as $ques) { ?>
            <?php   $count++;   ?>
                <div style='background-image: linear-gradient(#ffffff, #f5f5f5); padding:10px'>
                <p style="all: unset; font-family: 'Roboto', sans-serif; font-weight:bold"><?php echo $count.") Ques:".$ques->question; ?></p>
                <label for="options">Options: </label>
                <ul id="options" name="options">
                    <?php if($ques->a != ' ') {?>
                        <li style="font-family: 'Roboto', sans-serif;">(a) <?php echo $ques->a; ?></li>
                    <?php } ?>
                    <?php if($ques->b != ' ') {?>
                        <li style="font-family: 'Roboto', sans-serif;">(b) <?php echo $ques->b; ?></li>
                    <?php } ?>
                    <?php if($ques->c != ' ') {?>
                        <li style="font-family: 'Roboto', sans-serif;">(c) <?php echo $ques->c; ?></li>
                    <?php } ?>
                    <?php if($ques->d != ' ') {?>
                        <li style="font-family: 'Roboto', sans-serif;">(d) <?php echo $ques->d; ?></li>
                    <?php } ?>
                </ul>
                <label style="font-family: 'Roboto', sans-serif;">Answer:</label>
                <select name='answer[]' >
                        
                    <option value=""></option>
                    
                    <?php if($ques->a != ' ') {?>
                        <option value='a'>a</option>
                    <?php } ?>
                    <?php if($ques->b != ' ') {?>
                        <option value='b'>b</option>
                    <?php } ?>

                    <?php if($ques->c != ' ') {?>
                        <option value='c'>c</option>
                    <?php } ?>

                    <?php if($ques->d != ' ') {?>
                        <option value='d'>d</option>
                    <?php } ?>

                </select>
                <br>
                <br>
                <input type="hidden" name="qid[]" id="" value='<?php echo $ques->id;?>'>
                <input type="hidden" name="corrAns[]" id="" value='<?php echo $ques->answer;?>'>
                </div>
            <?php }?>

            <input type="hidden" name ='scId' value=<?php echo $schedule->id?>>
            <input type="hidden" name='submitDate' value='<?php echo date('Y-m-d');?>'>
            <input type="hidden" name='submitted' value="true">
            <div class="form-control" style="border:none">
                <button type='submit' 
                        id="btnsubmit" 
                        name='btnsubmit' 
                        class='btn btn-danger' 
                        value='submit'
                        >Submit</button>
            </div>
            </form>
        </div>
    </section>
    <!-- ===== End of Main Wrapper Job Section ===== -->




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


<script>
    var x = setInterval(function() {
    
    let startTime = "<?php echo $schedule->startTime; ?>";
    let endTime = "<?php echo $schedule->endTime; ?>";
    let clock = new Date();
    let currentTime = clock.getHours()+":"+clock.getMinutes()+":"+clock.getSeconds();
    let remainingTime = (Date.parse('01/01/2011 ' + endTime) - Date.parse('01/01/2011 ' + currentTime));
    let start = (Date.parse('01/01/2011 ' + currentTime) - Date.parse('01/01/2011 ' + startTime));
    
    if(start > 0){
        if(remainingTime > 0) {
        document.getElementById("form").style.visibility = "visible";    
        }
    }

    

    var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

    
    // Display the result in the element with id="demo"
    if(start > 0 && remainingTime > 0){
        document.getElementById("counter").innerHTML ="Timer: "+ hours + "h "
        + minutes + "m " + seconds + "s ";
    }

    if(start < 0 && remainingTime > 0){
        document.getElementById("counter").innerHTML ="Exam Starts at: " + startTime;
    }
    

    // If the count down is finished, write some text
    if (remainingTime < 0) {
    clearInterval(x);
    document.getElementById("answerForm").submit();
    document.getElementById("counter").innerHTML = "Time over";
    document.getElementById("form").style.visibility = "hidden";
    }
    }, 1000);
</script>

<?php require_once("../layouts/seeker_footer.php"); ?>

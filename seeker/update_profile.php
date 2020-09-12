<?php require_once('../layouts/seeker_header.php'); ?>

<?php 
    if(isset($_POST['submit'])){
        if(($_POST['id'] != '') && ($_POST['username'] != '') &&
         ($_POST['phoneNumber'] != '') && ($_POST['email'] != '')){
            if($_POST['id'] == $session->user_id) {
                $updatedSeeker = new Seeker;
                $updatedSeeker->id = $_POST['id'];
                $updatedSeeker->username = $_POST['username'];
                $updatedSeeker->phoneNumber = $_POST['phoneNumber'];
                $updatedSeeker->email = $_POST['email'];
                $updatedSeeker->password = $_POST['password'];

                if($updatedSeeker->update()){
                    $session->message('Profile Updated');
                } else {
                    $session->message('Profile Could Not Be Updated');
                }
            }
        }
    } elseif(isset($_POST['changePassword'])){
        if(($_POST['oldPassword'] != '') && ($_POST['newPassword'] != '')){
            $changePassSeeker = Seeker::find_by_id($session->user_id);
            
            if($_POST['oldPassword'] == $changePassSeeker->password ) {
                if(Seeker::change_password($session->user_id, $_POST['newPassword'])){
                    $session->message('Pasword Changed');
                }
            }
            
        }
    }
?>


<?php
    $seeker = Seeker::find_by_id($session->user_id);
?>


        <div class="container">
            <div class="row mt60">
            <p class="h1">Profile Info</p>
            <p><?php echo $message;?></p>
                    
      
    <form action="update_profile.php" method="post">

        <input type="hidden" name = 'id' value="<?php echo $seeker->id; ?>" name="id">
        <input type="hidden" name = 'password' value="<?php echo $seeker->password ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label  for="username">User Name</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $seeker->username; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo $seeker->phoneNumber; ?>">
            </div>
        </div>

    

        <div class="form-row">
            
            <div class="form-group col-md-12">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $seeker->email; ?>">
            </div>
        </div>
        
       

        <div class="col text-center">
            <button type="submit" class="btn btn-primary" value="update" name="submit">Save Changes</button>
        </div>
        <br>
        
    </form>
</div>
</div>



    <div class="container" style="padding:10px">
        
            <p class="h1">Change Password</p>
            <form action="update_profile.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label  for="username">Old Password</label>
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phoneNumber">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" >
                    </div>
                </div>
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary" value="changePassword" name="changePassword">
                        Change Password</button>
                </div>
            </form>
        
    </div>    

<?php require_once('../layouts/seeker_footer.php'); ?>
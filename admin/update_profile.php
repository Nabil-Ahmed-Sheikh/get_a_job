<?php require_once('../layouts/admin_header.php'); ?>
<?php $user = Admin::find_by_id($session->user_id); ?>


<div class="container" style="min-height:70vh">
            <p class="h3"><?php echo $session->message;?></p>

            <p class="h1">Change Info</p>
            <form action="../includes/admin_update.php" method="post">
                <div class="form-row">
                    <input type="hidden" name='id' value="<?php echo $user->id;?>">
                    <input type="hidden" name='password' value="<?php echo $user->password;?>">
                    <div class="form-group col-md-6">
                        <label  for="username">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value='<?php echo $user->name;?>'>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phoneNumber">Number</label>
                        <input type="text" class="form-control" id="number" name="number" value='<?php echo $user->phoneNumber;?>'>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label  for="username">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value='<?php echo $user->email;?>'>
                    </div>
                </div>
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary" value="changeInfo" name="changeInfo">
                        Change Info</button>
                </div>
            </form>

            <div style="padding-bottom:10px">
            <p class="h1">Change Password</p>
            <form action="../includes/admin_update.php" method="post">
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
            
        
    </div> 

<?php require_once('../layouts/admin_footer.php') ?>
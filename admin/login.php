<?php require_once('../includes/initialize.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
    <div class=" align-self-center col-md-4 ">
        <div class="card">
            <div class="card-header">
                <h5>Login</h5> 
                <?php ?>
                <p><?php echo $session->message;?></p>
                <?php ?>
            </div>
            
            <div class="card-body">
                <form action="../includes/admin_validation.php" method='post'>
                    <div class="form-group">
                        
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        
                    </div>
                    <div class="form-group">
                        
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
                        
                    </div>
                    
                        <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                    
                </form>
            </div>
        </div>
    </div>
    </div>
    
</div>







</body>
</html>
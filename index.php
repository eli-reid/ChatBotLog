<?php 
include_once 'Inc/Validate.php';
?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <?php include_once 'templates/headerscripts.php';?>
    </head>
    <body>
        <div class="loginmodal-container" style="margin-top: 200px">
            <div class="alert alert-warning alert-dismissible " role="alert"  id='alert_template' style="display: none">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php  
                if($fail){
            ?>
            <script>
                $("#alert_template button").after('<span><?php echo $mmsg ?></span>');
                $('#alert_template').show();
            </script>
            <?php } ?>
            <div class="wrapper">
                <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">     
                    <h2 class="form-signin-heading">Chat Log Login</h2>
                    <input type="text" class="form-control" name="username" placeholder="User Name" required="" autofocus="" />
                    <input type="password" class="form-control" name="pass" placeholder="Password" required=""/>      
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
                </form>
                <div class="login-help">
                    <a href="/user/register/">Register</a> - <a href="/user/password/forgot/">Forgot Password</a>
                </div>
            </div>
        </div>        
    </body>
</html>

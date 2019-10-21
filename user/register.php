<?php 
include_once '../Inc/Register.php';
?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include_once '../templates/headerscripts.php';?>
    </head>
    <body>
         <div class="loginmodal-container">
            <div class="alert alert-warning alert-dismissible " role="alert"  id='alert_template' style="display: none">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
              <?php  
                if($fail){
            ?>
            <script>
                $("#alert_template button").after('<span><?php echo $msg . '!' ?></span>');
                $('#alert_template').show();
            </script>
            <?php }?>
             <h2 class="form-signin-heading " style="justify-content: center" ></h2>
             <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method='POST' id='register' class="form-signin" 
                   oninput='password2.setCustomValidity(password2.value != password.value ? "Passwords do not match." : "")'>
                <input type='text' 
                       name='username' 
                       placeholder="User Name"  
                       data-toggle="tooltip" 
                       data-placement="top" 
                       title="User Name"
                       class='form-control' required 
                       value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'], ENT_QUOTES) : "";  ?>" />
                <input type='email' 
                       name='email'  
                       placeholder="Email" 
                       data-toggle="tooltip" 
                       data-placement="top" 
                       title="Email"
                       class='form-control' 
                       required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" />
                <input type='password' 
                       name='password' 
                       placeholder="Password" 
                       class='form-control' 
                       required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                       title="Password must be 8 characters including 1 uppercase letter, 1 lowercase letter and numeric characters"
                       id='passwordInput'>
                <input type='password' name='password2' placeholder="Confirm Password" class='form-control' required id='passwordInput2'>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    <span class="glyphicon"></span> Register
                </button>
            </form>
         </div>
    </body>
</html>

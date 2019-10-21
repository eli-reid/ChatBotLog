<?php 
include_once '../../Inc/Forgot.php';
?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include_once '../../templates/headerscripts.php';?>
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
             <h2 class="form-signin-heading " style="justify-content: center" >Forgot Password</h2>
             <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method='POST' id='forot' class="form-signin">
                <input type='email' 
                       name='email'  
                       placeholder="Email" 
                       data-toggle="tooltip" 
                       data-placement="top" 
                       title="Email"
                       class='form-control' 
                       required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" />
                 <button class="btn btn-lg btn-primary btn-block" type="submit">
                    <span class="glyphicon"></span> Send
                </button>
            </form>
         </div>
    </body>
</html>

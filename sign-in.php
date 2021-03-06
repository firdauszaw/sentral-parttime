<!DOCTYPE html>
    <head>
        <?php include("includes/db_connection.php")?>
    </head>
    <style>
        input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        text-align: center;
        }

        input[type=submit] {
        width: 50%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        input[type=password] {
        width: 100%;
        padding: 12px 20px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        text-align: center;
        }


        input[type=submit]:hover {
        background-color: #45a049;
        }

        div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 8px;
        }

        h1 {
            text-align: center;
        }
    </style>
    <body>
    <?php include("components/navbar.php")?>        
    <?php include("includes/email-verifier.php")?>
    <?php include("includes/notification.php")?>
    <div class="container" id="main-content">
        <div class="container"> 
            <div class="row">
                <h1>Sign In</h1>
            </div>
            <div class="col-12 mb-5 text-center">
                <center>
                    <?php echo $email_already_verified; ?>
                    <?php echo $email_verified; ?>
                    <?php echo $activation_error; ?>
                    <?php echo $notification; ?>
                </center>
            </div>
            <form method="POST" action="includes/login.php" enctype="multipart/form-data"><center>
                <div class="row" style="width: 50%;">
                    <div class="form-group">
                        <label for="form_firstname">Email :</label>
                        <input id="form_firstname" type="text" name="signinEmail" class="form-control" placeholder="Please enter your email" value="<?php if(isset($_COOKIE["rememberEmail"])) { echo $_COOKIE["rememberEmail"]; } ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input id="password" type="password" name="signinPassword" class="form-control" placeholder="Please enter your password" value="<?php if(isset($_COOKIE["rememberPass"])) { echo $_COOKIE["rememberPass"]; } ?>">
                    </div>
                    <div class="form-group">
                        <div><input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["remember"])) {  echo "checked";  } ?> />
                        <label for="remember">Remember me</label></div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" id="right-label" value="Login" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
                    </div> 
                </div></center>
            </form>
            <div>
                <center>
                    <a href="forget-password.php"><button type="button">Forgot Password?</button></a>
                </center>
            </div>
        </div>
    </div>
    </body>
</html>

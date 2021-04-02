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
        }

        input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
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
    <div class="container" id="main-content">
        <div class="container"> 
            <div class="row">
                <h1>Sign In</h1>
            </div>
            <form method="POST" action="includes/login.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group">
                        <label for="form_firstname">Email :</label>
                        <input id="form_firstname" type="email" name="signinEmail" class="form-control" placeholder="Please enter your email" value="<?php if(isset($_COOKIE["rememberEmail"])) { echo $_COOKIE["rememberEmail"]; } ?>">
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
                </div>
            </form>
        </div>
    </div>
    </body>
</html>

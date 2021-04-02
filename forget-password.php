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
    <?php include("includes/notification.php")?>
    <div class="container" id="main-content">
        <div class="container"> 
            <div class="col-12 mb-5 text-center">
                <center>
                    <?php echo $notification; ?>
                </center>
            </div>
            <form method="POST" action="includes/forgotpassword.php" enctype="multipart/form-data"><center>
                <div class="row" style="width: 50%;">
                    <div class="form-group">
                        <label for="form_firstname">Please enter an email that has been associated with the account</label><br><br>
                        <label for="form_firstname">Email :</label>
                        <input id="form_firstname" type="text" name="email" class="form-control" placeholder="Please enter your email" value="<?php if(isset($_COOKIE["rememberEmail"])) { echo $_COOKIE["rememberEmail"]; } ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="forgot" id="right-label" value="Login" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
                    </div> 
                </div></center>
            </form>
        </div>
    </div>
    </body>
</html>

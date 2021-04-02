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

        input[type=password], select {
        width: 100%;
        padding: 12px 20px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
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
        .container {
            width: auto;
        }
    </style>
    <script>
        function check_pass() {
            if (document.getElementById('password').value ==
                    document.getElementById('confirmpassword').value) {
                document.getElementById('submit').disabled = false;
            } else {
                document.getElementById('submit').disabled = true;
            }
        }
    </script>
    <body>
    <?php include("components/navbar.php")?>
    <?php include("includes/notification.php")?>
    <div class="container" id="main-content">
        <div class="container"> 
            <div class="row">
                <h1>Sign Up</h1>
            </div>
            <div class="col-12 mb-5 text-center">
                <center>
                    <?php echo $notification; ?>
                </center>
            </div>
            <center>
            <form method="POST" action="includes/register.php" enctype="multipart/form-data"  style="width:50%;">
                <div class="row">
                    <div class="form-group">
                        <label for="form_firstname">First Name :</label>
                        <input id="form_firstname" type="text" name="firstname" class="form-control" placeholder="Please enter your first name *" required="required" autofocus=""
                        pattern="[a-zA-Z]+$" title="Only characters are accepted">
                    </div>
                    <div class="form-group">
                        <label for="form_lastname">Last Name :</label>
                        <input id="form_lastname" type="text" name="lastname" class="form-control" placeholder="Please enter your last name *" required="required" autofocus=""
                        pattern="[a-zA-Z]+$" title="Only characters are accepted">
                    </div>
                    <div class="form-group">
                        <label for="form_username">Username :</label>
                        <input id="form_username" type="text" name="username" class="form-control" placeholder="Please enter your username *" required="required" autofocus=""
                        pattern="[A-Za-z0-9]+$" title="Only characters and integers are accepted">
                    </div>
                    <div class="form-group">
                        <label for="form_email">Email :</label>
                        <input type="text" id="form_email" class="form-control" placeholder="Your Email *" name="email" required="required"
                        pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)" title="Please follow email format">
                    </div>
                    <div class="form-group">
                        <label for="form_res_address">Residential Address :</label>
                        <input id="form_res_address" type="text" name="res_address" class="form-control" placeholder="Please enter your residential address *" 
                         required="required" autofocus=""
                        pattern="[A-Za-z0-9 ]+$" title="Only characters and integers are accepted">
                    </div>
                    <div class="form-group">
                        <label for="form_res_contact">Residential Contact No :</label>
                        <input id="form_res_contact" type="text" name="res_contact" class="form-control" placeholder="Please enter your residential contact no" 
                        required="required" autofocus=""
                        pattern="[0-9]+$" title="Only integers are allowed">
                    </div>
                    <div class="form-group">
                        <label for="form_mob_contact">Mobile Contact No :</label>
                        <input id="form_mob_contact" type="text" name="mob_contact" class="form-control"  placeholder="Please enter your mobile contact no" 
                        required="required" autofocus=""
                        pattern="[0-9]+$" title="Only integers are allowed">
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth :</label>
                        <input id="dob" type="date" name="dob" class="form-control" placeholder="Please enter your date of birth" required="required" max="<?php echo date("Y-m-d"); ?>" autofocus="">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender :</label><br>
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male">Male</label><br>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label><br>
                        <input type="radio" id="other" name="gender" value="other">
                        <label for="other">Other</label>
                    </div>
                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input id="password" type="password" name="password" class="form-control" pattern="(?=.*\d)(?=.*[A-Z]).{6,}" placeholder="Please enter your password" required="required" minlength="6" autofocus=""
                        title="6 characters minimum, must include 1 capital letter and 1 integer" onchange="check_pass();">
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Password :</label>
                        <input id="confirmpassword" type="password" name="confirmpassword" class="form-control" pattern="(?=.*\d)(?=.*[A-Z]).{6,}" placeholder="Please enter your password" required="required" minlength="6" autofocus=""
                        title="6 characters minimum, must include 1 capital letter and 1 integer" onchange="check_pass();">
                    </div>
                    <div class="form-group">
                        <label for="file">Profile Picture :</label>
                        <input type="file" name="file">
                    </div>  
                    <div class="form-group">
                        <input type="submit" name="save" id="right-label" value="Register" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
                    </div> 
                </div>
            </form></center>
        </div>
    </div>
    </body>
</html>

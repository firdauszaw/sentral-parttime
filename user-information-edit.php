<!DOCTYPE html>
    <head>
        <?php include("includes/db_connection.php")?>
        <?php if(!isset($_SESSION['userid'])){
            header("location:sign-in.php"); 
            exit();} 
        ?>
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
        .container {
            width: auto;
        }
    </style>
    <body>
    <?php include("components/navbar.php")?>
    <?php include("includes/userinfo.php")?>
    <?php include("includes/notification.php")?>
    <div class="container" id="main-content">
        <div class="container"> 
            <div class="row">
                <h1>Edit User Information</h1>
            </div>
            <div class="col-12 mb-5 text-center">
                <center>
                    <?php echo $notification; ?>
                </center>
            </div>
            <center>
            <form method="POST" action="includes/edituserinfo.php" enctype="multipart/form-data" style="width:50%;">
                <div class="row">
                    <!-- hidden input type to set the id of the user  -->
                    <input id="userid" type="hidden" name="userid" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="form_fullname">Full Name :</label>
                        <input id="form_fullname" type="text" name="fullname" class="form-control" value="<?php echo $firstname . ' ' . $lastname; ?>" placeholder="<?php echo $firstname . ' ' . $lastname; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="form_username">Username :</label>
                        <input id="form_username" type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="Please enter your username *"   required="required" autofocus=""
                        pattern="[A-Za-z0-9]+$" title="Only characters and integers are accepted">
                    </div>
                    <div class="form-group">
                        <label for="form_email">Email :</label>
                        <input type="text" id="form_email" class="form-control" value="<?php echo $email; ?>" placeholder="Your Email *" name="email" required="required"
                        pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)" title="Please follow email format">
                    </div>
                    <div class="form-group">
                        <label for="form_res_address">Residential Address :</label>
                        <input id="form_res_address" type="text" name="res_address" class="form-control" value="<?php echo $res_address; ?>" placeholder="Please enter your residential address *" 
                         required="required" autofocus=""
                        pattern="[A-Za-z0-9 ]+$" title="Only characters and integers are accepted">
                    </div>
                    <div class="form-group">
                        <label for="form_res_contact">Residential Contact No :</label>
                        <input id="form_res_contact" type="text" name="res_contact" class="form-control" value="<?php echo $res_contact; ?>" placeholder="Please enter your residential contact no" 
                        required="required" autofocus=""
                        pattern="[0-9]+$" title="Only integers are allowed">
                    </div>
                    <div class="form-group">
                        <label for="form_mob_contact">Mobile Contact No :</label>
                        <input id="form_mob_contact" type="text" name="mob_contact" class="form-control" value="<?php echo $mob_contact; ?>" placeholder="Please enter your mobile contact no" 
                        required="required" autofocus=""
                        pattern="[0-9]+$" title="Only integers are allowed">
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth :</label>
                        <input id="dob" type="date" name="dob" class="form-control" value="<?php echo $dob; ?>" placeholder="Please enter your date of birth" required="required" max="<?php echo date("Y-m-d"); ?>" autofocus="">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender :</label><br>
                        <input type="radio" id="male" name="gender" value="male" <?php echo($gender == 'male' ? 'checked = checked': ''); ?>>
                        <label for="male">Male</label><br>
                        <input type="radio" id="female" name="gender" value="female" <?php echo($gender == 'female' ? 'checked = checked': ''); ?>>
                        <label for="female">Female</label><br>
                        <input type="radio" id="other" name="gender" value="other" <?php echo($gender == 'other' ? 'checked = checked': ''); ?>>
                        <label for="other">Other</label>
                    </div>
                    <div class="form-group">
                        <label for="password-area">The password are similar to the old one, any update done on the password field will be counted as editing current password</label><br>
                        <label for="password">New Password :</label>
                        <input id="password" type="password" name="password" class="form-control" pattern="(?=.*\d)(?=.*[A-Z]).{6,}" placeholder="Please enter your new password"
                        title="6 characters minimum, must include 1 capital letter and 1 integer" onchange="check_pass();">
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm New Password :</label>
                        <input id="confirmpassword" type="password" name="confirmpassword" class="form-control" pattern="(?=.*\d)(?=.*[A-Z]).{6,}" placeholder="Please enter your new password" 
                        title="6 characters minimum, must include 1 capital letter and 1 integer" onchange="check_pass();">
                    </div>
                    <div class="form-group">
                        <label for="new-profile-picture">Any upload to the profile picture will replace the current profile picture</label><br>
                        <label for="file">New Profile Picture :</label>
                        <input type="file" name="file">
                    </div>  
                    <div class="form-group">
                        <input type="submit" name="submit" id="right-label" value="Edit" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
                    </div> 
                </div>
            </form>
            </center>
        </div>
    </div>
    </body>
</html>

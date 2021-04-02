<?php
//Any notification or error code will use this file to process and display the notification
if(!empty($_GET['c'])){
    $code = $_GET['c'];
 } else {
     $code = "";
 }

 $notification = "";

 if($code != "") {
    if($code == "wp"){
        $notification = "Wrong username/password provided!";
    }else if($code == "sv"){
        $notification = "Successfully registered! Please check your email to verify.";
    }else if($code == "fr"){
        $notification = "Failed to register. Please try again.";
    }else if($code == "es"){
        $notification = "There is a problem with email sender. Please try again with another email.";
    }else if($code == "up"){
        $notification = "Error uploading profile picture!. Please try again.";
    }else if($code == "ar"){
        $notification = "Email has been registered as one of the users before!";
    }else if($code == "am"){
        $notification = "Account with the same email does not exist or does not being verified yet.";
    }else if($code == "eb"){
        $notification = "Enter both username and password!";
    }else if($code == "pu"){
        $notification = "There is a problem updating the profile! Please try again.";
    }else if($code == "su"){
        $notification = "Profile successfully updated.";
    }else if($code == "ps"){
        $notification = "Password reset successfully! Please check your email for the new temporary password.";
    }else if($code == "ns"){
        $notification = "Password and confirm password does not match. Please try again.";
    }else if($code == "ft"){
        $notification = "Only .png and .jpg type files are allowed. Please try again.";
    }
}
?>
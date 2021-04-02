<?php
include("db_connection.php");

//setting up the mailer for sending emails to user
require_once('../vendor/autoload.php');

//if we accessed this register file by clicking the form
if(isset($_POST["save"])){
    $username     = $_POST["username"];
    $firstname     = $_POST["firstname"];
    $lastname      = $_POST["lastname"];
    $email         = $_POST["email"];
    $res_address     = $_POST["res_address"];
    $res_contact     = $_POST["res_contact"];
    $mob_contact     = $_POST["mob_contact"];
    $dob     = $_POST["dob"];
    $gender     = $_POST["gender"];
    $password      = $_POST["password"];


    //checking if the email has already registered before 
    $checkquery = mysqli_query($conn, "SELECT * FROM user WHERE email = '{$email}'");
    $rowcount = mysqli_num_rows($checkquery);

    //return back to the registration page if the email has already been used before
    if($rowcount > 0){
        header("location:../signup.php?c=up"); 
        exit();
    }
    else
    {
        //cleaning the form data 
        $_username = mysqli_real_escape_string($conn, $username);
        $_firstname = mysqli_real_escape_string($conn, $firstname);
        $_lastname = mysqli_real_escape_string($conn, $lastname);
        $_email = mysqli_real_escape_string($conn, $email);
        $_res_address = mysqli_real_escape_string($conn, $res_address);
        $_res_contact = mysqli_real_escape_string($conn, $res_contact);
        $_mob_contact = mysqli_real_escape_string($conn, $mob_contact);
        $_dob = mysqli_real_escape_string($conn, $dob);
        $_gender = mysqli_real_escape_string($conn, $gender);
        $_password = mysqli_real_escape_string($conn, $password);

        //generating token activation key
        $token = md5(rand().time());

        //password hashing
        $passwordhash = md5($password);

        if($_FILES['file']['name'] != ""){
            //checking the file upload
            $file = rand(1000,100000)."-".$_FILES['file']['name'];
            $temp_file_name = $_FILES['file']['tmp_name'];
            $folder="../upload/";
            //if the folder doesnt exit, create one
            if(!is_dir($folder)) {
                mkdir($folder);
            }
            $new_file_name = strtolower($file);
            $file_location=str_replace(' ','-',$new_file_name);
            if(!move_uploaded_file($temp_file_name,$folder.$file_location)){
                header("location:../signup.php?c=up"); 
                exit();
            }
        }else{
            $file_location = "user.jpg";
        }

        //insert query
        $query="INSERT INTO user(username, firstname, lastname, email, res_address, res_contact, mob_contact, dob, gender, password, token, profilepicture) 
        VALUES ('$username', '$firstname','$lastname','$email','$res_address','$res_contact','$mob_contact','$dob', '$gender', '$passwordhash', '$token', '$file_location')";

        // create mysql query
        $sqlQuery = mysqli_query($conn, $query);
                
        if(!$sqlQuery){
            die("MySQL query failed!" . mysqli_error($conn));
        } 
        // Send verification email
        if($sqlQuery) {
            $msg = 'Click on the activation link to verify your email. <br><br>
              <a href="http://localhost/sentral/sign-in.php?token='.$token.'"> Click here to verify email</a>
            ';

            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername('oneanotherno97@gmail.com')
            ->setPassword('971215146149');

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message('Please Verify Email Address!'))
            ->setFrom([$email => $firstname . ' ' . $lastname])
            ->setTo($email)
            ->addPart($msg, "text/html")
            ->setBody('Hello! User');

            // Send the message
            $result = $mailer->send($message);
              
            if(!$result){
                header("location:../signup.php?c=fr");  
                exit();
            } else {
                header("location:../sign-in.php?c=sv"); 
                exit();
            }
            
        }else{
            header("location:../signup.php?c=fr"); 
            exit();
        }
        
    }

}
?>

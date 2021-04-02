<?php

include("db_connection.php");
//setting up the mailer for sending emails to user
require_once('../vendor/autoload.php');
$errorMessage = '';

if(!empty($_POST["forgot"])){	
    
	$email = $_POST['email'];
	$sqlQuery = "SELECT * FROM user WHERE email='".$email."'";
	$resultSet = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
	$isAccountExist = mysqli_num_rows($resultSet);	
	if($isAccountExist == 1){
		$new_password = "Temp".rand(100000,999999);
        $hashed_new_password = md5($new_password);

        $query = "UPDATE user 
          set password = '" . $hashed_new_password . "'
          WHERE email='".$email."'";

         // create mysql query
         $sqlQuery = mysqli_query($conn, $query);

        if(!$sqlQuery){
            die("MySQL query failed!" . mysqli_error($conn));
           header("location:../forget-password.php?c=pu");
           exit();
        }else{
            $msg = '<p>You have successfully reset your password on Sentral</p><br><br>
            <p>You new temporary password is as follows: '.$new_password.'</p>';
    
            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername('sentralmail1@gmail.com')
            ->setPassword('$entral99');
    
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
                header("location:../forget-password.php?c=es");
                exit();
            } else {
                header("location:../forget-password.php?c=ps");
                exit();
            }
        }
	} else {	
        header("location:../forget-password.php?c=am");
        exit(); 
	}
} else{
	header("location:../sign-in.php"); 
    exit(); 
}
?>



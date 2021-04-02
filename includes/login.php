<?php

include("db_connection.php");
$errorMessage = '';
if(!empty($_POST["login"]) && $_POST["signinEmail"]!=''&& $_POST["signinPassword"]!='') {	
	$email_signin = $_POST['signinEmail'];
	$password_signin = $_POST['signinPassword'];
	$sqlQuery = "SELECT * FROM user WHERE email='".$email_signin."'";
	$resultSet = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
	$isAccountExist = mysqli_num_rows($resultSet);	
	if($isAccountExist > 0){

		$userDetails = mysqli_fetch_assoc($resultSet);
        var_dump($userDetails);
        if(password_verify($password_signin, $userDetails['password'])){
            if(!empty($_POST["remember"])) {
                setcookie("rememberEmail", $email_signin, time()+3600, "/", NULL);  
                setcookie("rememberPass", $password_signin,	time()+3600, "/", NULL);
                setcookie("remember", "", time()+3600, "/", NULL);
            } else {
                setcookie("rememberEmail","",time()-3600, "/", NULL); 
                setcookie("rememberPass","",time()-3600, "/", NULL);
                setcookie("remember", "", time()-3600, "/", NULL);
            }

            $_SESSION['username'] = $userDetails['username']; 
            $_SESSION['userid'] = $userDetails['id'];       
            header("location:../index.php"); 
        }else{
            $errorMessage = "Wrong password";	
            echo $errorMessage;	
        }
	} else {		
		$errorMessage = "Account doesn't exist";	
        echo $errorMessage;	 
	}
} else if(!empty($_POST["loginEmail"])){
	$errorMessage = "Enter both user and password!";	
    echo $errorMessage;
}	
?>



<?php

include("db_connection.php");
$errorMessage = '';

if(!empty($_POST["login"]) && $_POST["signinEmail"]!=''&& $_POST["signinPassword"]!='') {	
	$email_signin = $_POST['signinEmail'];
	$password_signin = $_POST['signinPassword'];
	$sqlQuery = "SELECT * FROM user WHERE email='".$email_signin."'";
	$resultSet = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
	$isAccountExist = mysqli_num_rows($resultSet);	
	if($isAccountExist == 1){

		$userDetails = mysqli_fetch_assoc($resultSet);
        if(md5($password_signin) == $userDetails['password']){
            if(!empty($_POST["remember"])) {
                setcookie("rememberEmail", $email_signin, time()+3600, "/", NULL);  
                setcookie("rememberPass", $password_signin,	time()+3600, "/", NULL);
                setcookie("remember", "true", time()+3600, "/", NULL);
            } else {
                setcookie("rememberEmail","",time()-3600, "/", NULL); 
                setcookie("rememberPass","",time()-3600, "/", NULL);
                setcookie("remember", "true", time()-3600, "/", NULL);
            }

            $_SESSION['username'] = $userDetails['username']; 
            $_SESSION['userid'] = $userDetails['id'];       
            header("location:../user-information.php"); 
        }else{
            header("location:../sign-in.php?c=wp"); 
            exit();	
        }
	} else {		
		header("location:../sign-in.php?c=am"); 
        exit(); 
	}
} else{
	header("location:../sign-in.php?c=eb"); 
    exit(); 
}
?>



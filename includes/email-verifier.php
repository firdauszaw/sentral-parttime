<?php
//verification on the email after the user register
if(!empty($_GET['token'])){
    $token = $_GET['token'];
 } else {
     $token = "";
 }
 $email_verified = "";
 $email_already_verified = "";
 $activation_error = "";

 if($token != "") {
    $sqlQuery = mysqli_query($conn, "SELECT * FROM temp_user WHERE token = '$token' ");
    $countRow = mysqli_num_rows($sqlQuery);

    //check for the main table
    $query = mysqli_query($conn, "SELECT * FROM user WHERE token = '$token' ");
    $mainCountRow = mysqli_num_rows($query);

    if($countRow == 1 && $mainCountRow < 1){
        while($rowData = mysqli_fetch_array($sqlQuery)){
            //insert query
            $query="INSERT INTO user SELECT * FROM temp_user WHERE token = '$token'";

            $update = mysqli_query($conn, $query);
            if($update){
                $email_verified = '<div class="alert alert-success">
                        User email successfully verified!
                    </div>
                ';
            }
        }
    } else if($countRow == 1 && $mainCountRow == 1) {
        $email_already_verified = '<div class="alert alert-danger">
                           User email already verified!
                        </div> ';
    }else {
        $activation_error = '<div class="alert alert-danger">
                Activation error!
            </div> ';
    }
}
?>
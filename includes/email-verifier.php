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
    $sqlQuery = mysqli_query($conn, "SELECT * FROM user WHERE token = '$token' ");
    $countRow = mysqli_num_rows($sqlQuery);

    if($countRow == 1){
        while($rowData = mysqli_fetch_array($sqlQuery)){
            $is_active = $rowData['is_active'];
              if($is_active == 0) {
                 $update = mysqli_query($conn, "UPDATE user SET is_active = '1' WHERE token = '$token' ");
                   if($update){
                       $email_verified = '<div class="alert alert-success">
                              User email successfully verified!
                            </div>
                       ';
                   }
              } else {
                    $email_already_verified = '<div class="alert alert-danger">
                           User email already verified!
                        </div>
                    ';
              }
        }
    } else {
        $activation_error = '<div class="alert alert-danger">
                Activation error!
            </div>
        ';
    }
}
?>
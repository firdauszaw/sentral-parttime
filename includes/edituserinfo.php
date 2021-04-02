<?php
include("db_connection.php");

//if we accessed this register file by clicking the form
if(isset($_POST["submit"])){

    $userid = $_POST["userid"];
    $username     = $_POST["username"];
    $email         = $_POST["email"];
    $res_address     = $_POST["res_address"];
    $res_contact     = $_POST["res_contact"];
    $mob_contact     = $_POST["mob_contact"];
    $dob     = $_POST["dob"];
    $gender     = $_POST["gender"];   
    $checkuploadprofilepicture = "";
    //fetching data from user table again
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = '{$userid}'");
    $userData = mysqli_fetch_assoc($result);
    $dataRowNum = mysqli_num_rows($result);

    if($dataRowNum = 0){
        header("location:../user-information-edit.php?c=pu");
        exit();
    }else{
        if(isset($_POST["password"])){
            $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
        }else{
            $password = $userData['password']; 
        }
    
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
                header("location:../user-information-edit.php?c=up");
                exit();
            }
        }else{
            $file_location = $userData['profilepicture'];
        }

         //cleaning the form data befpre updating the table
         $_username = mysqli_real_escape_string($conn, $username);
         $_email = mysqli_real_escape_string($conn, $email);
         $_res_address = mysqli_real_escape_string($conn, $res_address);
         $_res_contact = mysqli_real_escape_string($conn, $res_contact);
         $_mob_contact = mysqli_real_escape_string($conn, $mob_contact);
         $_dob = mysqli_real_escape_string($conn, $dob);
         $_gender = mysqli_real_escape_string($conn, $gender);

         $query = "UPDATE user 
          set username = '" . $username . "',
          email = '" . $email . "',
          res_address = '" . $res_address . "',
          res_contact = '" . $res_contact . "',
          mob_contact = '" . $mob_contact . "',
          dob = '" . $dob . "',
          gender = '" . $gender . "',
          password = '" . $password . "',
          profilepicture = '" . $file_location . "'
          WHERE id = " . $userid . "
         ";
         // create mysql query
         $sqlQuery = mysqli_query($conn, $query);
                    
         if(!$sqlQuery){
             die("MySQL query failed!" . mysqli_error($conn));
            header("location:../user-information.php?c=pu");
            exit();
         }else{
            header("location:../user-information.php?c=su");
            exit();
         }
    }
}else{
    header("location:../sign-in.php");
    exit();
}
?>

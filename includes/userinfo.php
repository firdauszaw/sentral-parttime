<?php
//checking whether there is a session ongoing or not
if (!isset($_SESSION["userid"])){
    header("location:./sign-in.php");
    exit();
}else{
    //querying the user data
    $sql = "SELECT * from user WHERE id = ".$_SESSION["userid"];
    $query = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    $data = mysqli_fetch_assoc($query);

    $username = $data['username'];
    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $email = $data['email'];
    $res_address = $data['res_address'];
    $res_contact = $data['res_contact'];
    $mob_contact = $data['mob_contact'];
    $dob = $data['dob'];
    $gender = $data['gender'];
    $profilepicture = $data['profilepicture'];
}
?>
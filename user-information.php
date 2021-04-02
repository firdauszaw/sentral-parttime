b<!DOCTYPE html>
    <head>
        <?php include("includes/db_connection.php")?>
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

        h1, h3 {
            text-align: center;
        }

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        table, td, th {
            border: 1px solid black;
            text-align: center;
        }

        table {
            width: 50%;
            border-collapse: collapse;
        }
    </style>
    <script>
        function check_pass() {
            if (document.getElementById('password').value ==
                    document.getElementById('confirmpassword').value) {
                document.getElementById('submit').disabled = false;
            } else {
                document.getElementById('submit').disabled = true;
            }
        }
    </script>
    <body>
    <?php include("components/navbar.php")?>
    <?php include("includes/userinfo.php")?>
    <div class="container" id="main-content">
        <div class="container"> 
            <div class="row">
                <h1>User Information</h1>
                <img src="<?php echo './upload/'.$profilepicture ?>" alt="Profile picture" style="width:50%;">
                <h3>Profile Picture</h3>
            </div>
            <div class="row">
                <center>
                    <table>
                        <tr>
                            <th>Fields</th>
                            <th>Informations</th>
                        </tr>
                        <tr>
                            <td>First Name:</td>
                            <td> <?php echo $firstname; ?></td>
                        </tr>
                        <tr>
                            <td>Last Name:</td>
                            <td> <?php echo $lastname; ?></td>
                        </tr>
                        <tr>
                            <td>Username:</td>
                            <td> <?php echo $username; ?></td>
                        </tr>
                        <tr>
                            <td> Email:</td>
                            <td> <?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <td>Residential Address:</td>
                            <td> <?php echo $res_address; ?></td>
                        </tr>
                        <tr>
                            <td>Residential Contact No:</td>
                            <td> <?php echo $res_contact; ?></td>
                        </tr>
                        <tr>
                            <td>Mobile Contact No:</td>
                            <td> <?php echo $mob_contact; ?></td>
                        </tr>
                        <tr>
                            <td>Date of Birth:</td>
                            <td> <?php echo $dob; ?></td>
                        </tr>
                        <tr>
                            <td>Gender:</td>
                            <td> <?php echo $gender; ?></td>
                        </tr>
                    </table><br>
                    <a href="user-information-edit.php"><button type="button">Edit profile</button></a>
                </center>
            </div>
        </div>
    </div>
    </body>
</html>

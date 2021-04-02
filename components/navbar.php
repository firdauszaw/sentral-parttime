<!DOCTYPE html>
<html>
    <head>
        <style>
            ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            }

            li {
            float: left;
            border-right:1px solid #bbb;
            }

            li:last-child {
            border-right: none;
            }

            li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            }

            .b{
              display: block;
              color: white;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
            }

            .active {
            background-color: #4CAF50;
            }
        </style>
    </head>
    <body>
        <ul>
            
            <?php
              if(isset($_SESSION['username'])){
                echo '<li class="b">Welcome: '.$_SESSION['username'].'</li>';
                echo '<li style="float:right"><a href="./includes/logout.php"><i class="glyphicon glyphicon -log-out"></i>Log Out</a></li>';
                echo '<li style="float:right"><a href="signup.php"><i class="glyphicon glyphicon-user"></i>My Account</a></li>';
              }
              else {
                echo '<li style="float:right"><a href="sign-in.php"><i class="glyphicon glyphicon glyphicon-user"></i>Log In</a></li>';
                echo '<li style="float:right"><a href="signup.php"><i class="glyphicon glyphicon-log-in"></i>Sign Up</a></li>';
              }
            ?>
        </ul>
    </body> 
</html>

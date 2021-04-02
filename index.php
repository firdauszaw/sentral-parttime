<!DOCTYPE html>
    <head>
    <?php include("includes/db_connection.php")?>
    </head>
    <body>
    <?php include("components/navbar.php")?>
    <div class="container" id="main-content">
        <?php
              if(isset($_SESSION['username'])){
                echo '<h2>Welcome, '. $_SESSION['username'] .'</h2>';
              }
              else {
                echo '<h2>Welcome, User!</h2>';
              }
        ?>
        
    </div>
    </body>
</html>


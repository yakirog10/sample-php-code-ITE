<?php
// Sequence matters
include_once "server.php";
include_once "query.php";

// $conn->close()
?>
<html>
    <head>
     <title>experiment bitch</title>
     <!-- Documentation: https://www.w3schools.com/w3css/defaulT.asp -->
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
     <!-- <link rel="stylesheet" href="w3.css"> -->
    </head>
    <body>
    <div class="w3-bar w3-black">
        <a href="index.php" class="w3-bar-item w3-button">Home</a>
         
        <a href="?page=<?php echo isset($_SESSION["user_login"]) ? 'logout': 'login' ?>" class="w3-bar-item w3-button"><?php echo isset($_SESSION["user_login"]) ? 'Logout' : 'Login' ?></a>
        
        <a href="?page=register" class="w3-bar-item w3-button">Register</a>
        <a href="?page=search" class="w3-bar-item w3-button">Search</a>
    </div>
    
    <?php
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            if(isset($_GET["page"])){
                $page = $_GET["page"];
                switch($page) {
                    case 'login':
                        include "login.php";
                    break;
                    case 'logout':
                        include "logout.php";
                    break;
                    case 'register':
                        include "register.php";
                    break;
                    case 'search':
                        include "search.php";
                    break;
                }
            } else {
                include "home.php";
            }
        } 
    ?>
       
        
    </body>
</html>
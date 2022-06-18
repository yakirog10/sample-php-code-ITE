<?php
// Andito lahat ng php codes
session_start();
$username = $password = $birthday = "";
$user_login = null;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // When user register
    if(isset($_POST["register_username"])){
        $username = $_POST["register_username"];
        $password = $_POST["password"];
        $birthday = $_POST["birthday"];
        if($username != ""){
            insert_user($username, $password, $birthday, $conn);
        }
    }

    // When user login
    if(isset($_POST["login_username"])){
        user_login($_POST["login_username"], $_POST["password"], $conn);
    }
}

// FOR GET REQUESTS
if($_SERVER["REQUEST_METHOD"] == "GET") {
    // When user request get data
    if(isset($_GET["get_data"])){
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "id: ". $row["ID"] . "<br>"
                . "Name: " . $row["username"]. "<br>"
                . "password: " . $row["password"] . "<br>"
                . "birthday: " . $row["birthday"] . "<br>";
                echo "<hr>";
            }
        }
    }
    // When user request find_username
    if(isset($_GET["find_username"]))
    {
        $input = $_GET["find_username"];
        $sql = "SELECT * FROM user WHERE username = '$input'";

        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "id: ". $row["ID"] . "<br>"
                    . "Name: " . $row["username"]. "<br>"
                    . "password: " . $row["password"] . "<br>"
                    . "birthday: " . $row["birthday"] . "<br>";
                echo "<hr>";
            }
        }
    }
}


// use query() for single query
// $sql = "INSERT INTO user (username, password, birthday)
// VALUES ('johnDoe', '1234', '2001-03-25')";

// use multi_query() for multiple query
// $sql  = "DELETE FROM user WHERE ID = 2;";
// $sql .= "DELETE FROM user WHERE ID = 3;";
// $sql .= "DELETE FROM user WHERE ID = 4;";
// $sql .= "DELETE FROM user WHERE ID = 5;";
// $sql .= "DELETE FROM user WHERE ID = 6;";

function user_login($user, $pass, $conn){
    $sql = "SELECT * FROM user WHERE username = '$user' AND password = '$pass' ";

    // '1' == 1 true (implicit type conversion0)
    // '1' === 1 false (strict type)
    if ($result = $conn->query($sql)){

        if($result->num_rows > 0){
            // echo "we got data";
            $row = $result->fetch_assoc();
            $_SESSION["user_login"] = $row;
        } else {
            $_SESSION["user_login"] = false;
            
        }
    }
}
function select_user($user, $pass, $birthday, $conn){
    $sql_script = "INSERT INTO user (username, password, birthday)
        VALUES ('$user', '$pass', '$birthday')";

    if ($conn->query($sql_script) === TRUE) {
        echo "Insert data successfully";
    } else {
        echo "Error occured: " . $conn->error;
    }
}
function insert_user($user, $pass, $birthday, $conn){
    $sql_script = "INSERT INTO user (username, password, birthday)
        VALUES ('$user', '$pass', '$birthday')";

    if ($conn->query($sql_script) === TRUE) {
        echo "Insert data successfully";
    } else {
        echo "Error occured: " . $conn->error;
    }
}


<?php
session_start();
$un = $_POST["username"];
$pw = $_POST["password"];
$conn = new PDO("mysql:host=localhost;dbname=assign118;", "assign118","ao9ZeeJa");

$results = $conn->query("select * from users where name='$un'");
if($row=$results->fetch())
{
    if ($row["password"]==$pw){
        $_SESSION["gatekeeper"] = $un;
        $_SESSION["isadmin"]= $row["isadmin"];

    }
    else{
        echo "wrong password";
    }
}

?>
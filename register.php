<?php
session_start();
$un = htmlentities($_POST["username"]);
$pw = htmlentities($_POST["password"]);
$conn = new PDO("mysql:host=localhost;dbname=assign118;", "assing118", "ao9ZeeJa");
$results = $conn->prepare("select name from users where name = ?");
$results->bindParam(1,$un);
$results->execute();
if ($row=$results->fetch()){
    echo "This name is taken";
} else{
    echo "You have made an account";
    $results = $conn->prepare("INSERT INTO users(name,password, isadmin) VALUES (?,?,0)");
    $results->bindParam(1,$un);
    $results->bindParam(2,$pw);
    $results->execute();
}



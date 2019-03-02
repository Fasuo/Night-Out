<?php

$un = $_POST["username"];
$pw = $_POST["password"];
$conn = new PDO("mysql:host=localhost;dbname=assign118;", "assign118","ao9ZeeJa");


$results = $conn->prepare("INSERT INTO users(name,password, isadmin) VALUES (?,?,0)");
$results->bindParam(1,$un);
$results->bindParam(2,$pw);
$results->execute();
echo $un.$pw;
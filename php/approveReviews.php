<?php
session_start();
$id = $_POST["id"];
$conn = new PDO("mysql:host=localhost;dbname=assign118;", "assign118","ao9ZeeJa");
$results = $conn->prepare("UPDATE reviews SET approved = 1 WHERE ID=?;");
$results->bindParam(1,$id);
$results->execute();

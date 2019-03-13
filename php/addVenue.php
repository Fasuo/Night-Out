<?php
session_start();
if (isset ($_SESSION["username"]))
{
    $venueName = $_POST["venueName"];
    $venueDescription = $_POST["venueDescription"];
    $venueType = $_POST["venueType"];
    $user= $_SESSION["username"];
    echo $venueName.$venueDescription.$venueType.$user;
    $conn = new PDO("mysql:host=localhost;dbname=assign118;", "root");
    $results = $conn->prepare("INSERT INTO venues(name,type, description, username) VALUES (?,?,?,?)");
    $results->bindParam(1,$venueName);
    $results->bindParam(2,$venueType);
    $results->bindParam(3,$venueDescription);
    $results->bindParam(4, $user);
    $results->execute();
}
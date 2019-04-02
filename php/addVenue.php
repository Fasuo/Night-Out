<?php
session_start();
if (isset ($_SESSION["username"]))
{
    $venueName = htmlentities($_POST["venueName"]);
    $venueDescription = htmlentities($_POST["venueDescription"]);
    $venueType = htmlentities($_POST["venueType"]);
    $user= $_SESSION["username"];
    $conn = new PDO("mysql:host=localhost;dbname=assign118;", "assign118", "ao9ZeeJa");
    $results = $conn->prepare("INSERT INTO venues(name,type, description, username) VALUES (?,?,?,?)");
    $results->bindParam(1,$venueName);
    $results->bindParam(2,$venueType);
    $results->bindParam(3,$venueDescription);
    $results->bindParam(4, $user);
    $results->execute();
}
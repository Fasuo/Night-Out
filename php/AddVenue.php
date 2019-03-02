<?php
session_start();
if ( !isset ($_SESSION["gatekeeper"]))
{
    echo "You're not logged in. Go away!";
}
else{
    $venueName = $_POST["venueName"];
    $venueDescription = $_POST["venueDescription"];
    $venueType = $_POST["venueType"];
    $user= $_SESSION["gatekeeper"];
    echo $venueName.$venueDescription.$venueType.$user;
    $conn = new PDO("mysql:host=localhost;dbname=assign118;", "assign118","ao9ZeeJa");
    $results = $conn->prepare("INSERT INTO venues(name,type, description, username) VALUES (?,?,?,?)");
    $results->bindParam(1,$venueName);
    $results->bindParam(2,$venueType);
    $results->bindParam(3,$venueDescription);
    $results->bindParam(4, $user);
    $results->execute();
}
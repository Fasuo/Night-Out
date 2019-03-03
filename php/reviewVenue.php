<?php
session_start();
if ( !isset ($_SESSION["gatekeeper"]))
{
    echo "You're not logged in. Go away!";
}
else{
    $id = $_POST["id"];
    $review = $_POST["review"];
    $username = $_SESSION["gatekeeper"];
    $conn = new PDO("mysql:host=localhost;dbname=assign118;", "assign118","ao9ZeeJa");
    $results = $conn->prepare("INSERT INTO reviews(venueID, username, review) VALUES (?,?,?) ");
    $results->bindParam(1,$id);
    $results->bindParam(2,$username);
    $results->bindParam(3,$review);
    $results->execute();

}
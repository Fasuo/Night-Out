<?php
session_start();
if (isset ($_SESSION["username"])) {
    $id = $_POST["id"];
    $review = $_POST["review"];
    $username = $_SESSION["username"];
    $conn = new PDO("mysql:host=localhost;dbname=assign118;", "root");
    $results = $conn->prepare("INSERT INTO reviews(venueID, username, review) VALUES (?,?,?) ");
    $results->bindParam(1,$id);
    $results->bindParam(2,$username);
    $results->bindParam(3,$review);
    $results->execute();

}
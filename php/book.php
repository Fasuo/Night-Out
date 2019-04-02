<?php
session_start();
if (isset ($_SESSION["username"])) {
    $venueId= htmlentities($_POST["venueId"]);
    $date= htmlentities($_POST["date"]);
    $seats=htmlentities($_POST["seats"]);

    $conn = new PDO("mysql:host=localhost;dbname=assign118;", "assign118", "ao9ZeeJa");

    $results = $conn->prepare("select availability from availability where venueID=? AND dayofmonth=?");
    $results->bindParam(1,$venueId);
    $results->bindParam(2,$date);
    $results->execute();
    if($row=$results->fetch())
    {
        $availability= $row['availability']-$seats;
    }
    $results = $conn->prepare("update availability set availability = ? where venueID=? AND dayofmonth=?");
    $results->bindParam(1,$availability);
    $results->bindParam(2,$venueId);
    $results->bindParam(3,$date);
    $results->execute();
    echo $availability;
}
<?php
session_start();
if (isset ($_SESSION["username"])) {
    $id = htmlentities($_POST["id"]);
    $conn = new PDO("mysql:host=localhost;dbname=assign118;", "assign118", "ao9ZeeJa");
    $results = $conn->prepare("select dayofmonth, availability from availability where venueID=?");
    $results->bindParam(1,$id);
    $results->execute();
    while($row=$results->fetch())
    {
        echo $row['dayofmonth'].":".$row['availability']."|";
    }
}
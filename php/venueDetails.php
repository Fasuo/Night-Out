<?php
session_start();
$id = $_POST["id"];
$conn = new PDO("mysql:host=localhost;dbname=assign118;", "root");
$results = $conn->prepare("select * from venues where ID=?");
$results->bindParam(1,$id);
$results->execute();

if($row=$results->fetch())
{
    echo $row["name"]."/".$row["type"]."/".$row["description"]."/".$row["recommended"]."|";
}

$results = $conn->prepare("select * from reviews where venueID=? and approved=1");
$results->bindParam(1,$id);
$results->execute();

while($row=$results->fetch())
{
    echo $row["username"].":".$row["review"]."/";
}
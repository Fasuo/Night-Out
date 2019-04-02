<?php
session_start();
$keyword = '%'.htmlentities($_POST["keyword"]).'%';
$type = '%'.htmlentities($_POST["type"]).'%';
$conn = new PDO("mysql:host=localhost;dbname=assign118;", "assign118", "ao9ZeeJa");
$results = $conn->prepare("select * from venues where name like ? and type like ?");
$results->bindParam(1,$keyword);
$results->bindParam(2,$type);
$results->execute();


while($row=$results->fetch())
{
    echo $row["name"].":".$row["ID"].",";
}


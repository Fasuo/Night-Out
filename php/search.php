<?php
session_start();
$keyword = '%'.$_POST["keyword"].'%';
$type = '%'.$_POST["type"].'%';
$conn = new PDO("mysql:host=localhost;dbname=assign118;", "assign118","ao9ZeeJa");
$results = $conn->prepare("select * from venues where name like ? and type like ?");
$results->bindParam(1,$keyword);
$results->bindParam(2,$type);
$results->execute();
//$sql= "select * from venues where name like $keyword $type";
//echo $sql;
//$results = $conn->query($sql);
$searchResults= array();

while($row=$results->fetch())
{
    array_push($searchResults, $row["name"]);
    echo "<h1>".$row["name"]."</h1>";
}

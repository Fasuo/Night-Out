<?php
session_start();
if (isset ($_SESSION["username"])) {
    $id = htmlentities($_POST["id"]);
    $conn = new PDO("mysql:host=localhost;dbname=assign118;", "assign118", "ao9ZeeJa");
    $results = $conn->prepare("select recommended from venues where ID=?");
    $results->bindParam(1,$id);
    $results->execute();
    if($row=$results->fetch())
    {
        $recommended= $row['recommended']+1;
    }
    $results = $conn->prepare("update venues set recommended = ? where ID=?");
    $results->bindParam(1,$recommended);
    $results->bindParam(2,$id);
    $results->execute();
}
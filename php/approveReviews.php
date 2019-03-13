<?php
session_start();
if ($_SESSION["isadmin"]==1){
    $id = $_POST["id"];
    $conn = new PDO("mysql:host=localhost;dbname=assign118;", "root");
    $results = $conn->prepare("UPDATE reviews SET approved = 1 WHERE ID=?;");
    $results->bindParam(1,$id);
    $results->execute();
}


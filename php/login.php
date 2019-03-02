<?php
$un = $_POST["username"];
$pw = $_POST["password"];
$conn = new PDO("mysql:host=localhost;dbname=assign118;", "assign118","ao9ZeeJa");

$results = $conn->prepare("select * from users where name=?");
$results->bindParam(1,$un);
$results->execute();
if($row=$results->fetch())
{
    if ($row["password"]==$pw){
        $_SESSION["gatekeeper"] = $un;
        $_SESSION["isadmin"]= $row["isadmin"];
        echo $_SESSION["gatekeeper"];
    }
    else{
        echo "wrong password";
    }
}else{
    echo "wrong username/password";
}

?>
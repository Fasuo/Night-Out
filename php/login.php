<?php
session_start();
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

        if ($_SESSION["isadmin"]==1){
            $results = $conn->prepare("select * from reviews where approved=0");
            $results->execute();
            while($row=$results->fetch())
            {
//                echo $row["review"].$row["username"];
                echo "<tr>";
                echo "<td>".$row["review"]."</td>";
                echo "<td>".$row["username"]."</td>";
                echo "<td><button class=approveReview id=approve".$row["ID"].">Approve</button></td>";
                echo "</tr>";

            }
        }
    }
    else{
        echo "wrong password";
    }
}else{
    echo "wrong username/password";
}

?>

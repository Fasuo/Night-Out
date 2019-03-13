<script src="js/admin.js"></script>
<?php

        if ($_SESSION["isadmin"]==1){
            $conn = new PDO("mysql:host=localhost;dbname=assign118;", "root");
            $results = $conn->prepare("select * from reviews where approved=0");
            $results->execute();
            while($row=$results->fetch())
            {
                echo "<tr>";
                echo "<td>".$row["review"]."</td>";
                echo "<td>".$row["username"]."</td>";
                echo "<td><button class=approveReview onclick=approveReview(".$row["ID"].")>Approve</button></td>";
                echo "</tr>";

            }
        }
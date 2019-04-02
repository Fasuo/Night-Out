<script src="js/admin.js"></script>
<?php

        if ($_SESSION["isadmin"]==1){
            echo "<div class='admin'><h2>Pending reviews</h2>";
            echo "<div class='row'>";
            echo "<div class='col-4'>Review</div>";
            echo "<div class='col-4'>User</div>";
            echo "<div class='col-4'>Approve</div>";
            echo "<div class='line'></div>";
            echo "</div>";
            $conn = new PDO("mysql:host=localhost;dbname=assign118;", "assign118", "ao9ZeeJa");
            $results = $conn->prepare("select * from reviews where approved=0");
            $results->execute();
            while($row=$results->fetch())
            {
                echo "<div class='row'>";
                echo "<div class='col-4'>".$row["review"]."</div>";
                echo "<div class='col-4'>".$row["username"]."</div>";
                echo "<div class='col-4'><button class='approveReview btn btn-primary'onclick=approveReview(".$row["ID"].")>Approve</button></div>";
                echo "</div>";

            }
            echo "</div>";
        }
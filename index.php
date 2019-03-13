<?php
session_start();
$dbname= 'root';
$dbpw= '';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Night out</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
<?php
if (!isset($_SESSION["gatekeeper"])){
    echo '<h2>Log in/register</h2>
<form action="php/login.php" method="post">
Username: <input name="username" id="username"/>
Password: <input name="password" type="password" id="password" />
<button id="login" value="submit">Log in</button>
</form>';

}
else {
    echo '<h2>search</h2>
<input type="text" id="keyword" placeholder="keyword">
<select id="type">
    <option value="">All</option>
    <option value="Restaurant">Restaurant</option>
    <option value="fastfood">Fast Food</option>
    <option value="Bar">Bar</option>
    <option value="coffeeshop">Coffee Shop</option>
    <option value="pub">Pub</option>
    <option value="club">Club</option>
</select>
<button id="search"> Search</button>
<ul id="searchResults">
</ul>
<div id="currentlySelected">
    <h2 id="currentlySelectedName"></h2>
    <h3 id="currentlySelectedType"></h3>
    <p id="currentlySelectedDesc"></p>
    <h3 id="currentlySelectedRecommendations"></h3>
    <button id="currentlySelectedRecommend" value="">Recommend</button>
    <h2>Reviews</h2>
    <ul id="currentlySelectedReviews"></ul>
    <h2>Review this venue</h2>
    <textarea id="venueReview" maxlength="255"></textarea>
    <button id="currentlySelectedReview" value="">Review</button>
</div>
<h2>Add a new venue</h2>
<input type="text" id="newVenueName" placeholder="Name...">
<textarea type="textarea" id="newVenueDesc" placeholder="description..." maxlength="255"></textarea>
<select id="newVenueType">
    <option value="Restaurant">Restaurant</option>
    <option value="fastfood">Fast Food</option>
    <option value="Bar">Bar</option>
    <option value="coffeeshop">Coffee Shop</option>
    <option value="pub">Pub</option>
    <option value="club">Club</option>
</select>
<button id="addNewVenue">Add</button>';
}

?>
<script src="js/main.js"></script>
</body>
</html>


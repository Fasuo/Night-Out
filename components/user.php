<?php if (isset($_SESSION['username'])): ?>
    <h2>Search</h2>
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
<button class="btn btn btn-primary" id="search" onclick="search()"> Search</button>
<ul id="searchResults">
</ul>
<div id="currentlySelected">
    <h2 id="currentlySelectedName"></h2>
    <h3 id="currentlySelectedType"></h3>
    <p id="currentlySelectedDesc"></p>
    <h3 id="currentlySelectedRecommendations"></h3>
    <button class="btn btn btn-primary" onclick="recommendVenue(this.value)"  id="currentlySelectedRecommend" value="">Recommend</button>
    <h2>Reviews</h2>
    <ul id="currentlySelectedReviews"></ul>
    <h2>Review this venue</h2>
    <textarea id="venueReview" maxlength="255"></textarea>
    <button class="btn btn btn-primary" onclick="reviewVenue(this.value)" id="currentlySelectedReview" value="">Review</button>
    <div id="booking"><h2>Book your stay</h2></div>
</div>
<h2>Add a new venue</h2>
<input type="text" id="newVenueName" placeholder="Name..." >
<textarea type="textarea" id="newVenueDesc" placeholder="description..." maxlength="255" ></textarea>
<select id="newVenueType">
    <option value="Restaurant">Restaurant</option>
    <option value="fastfood">Fast Food</option>
    <option value="Bar">Bar</option>
    <option value="coffeeshop">Coffee Shop</option>
    <option value="pub">Pub</option>
    <option value="club">Club</option>
</select>
<button class="btnbtn btn-primary" onclick="addNewVenue()" id="addNewVenue">Add</button>

<?php endif; ?>
<script src="js/user.js"></script>
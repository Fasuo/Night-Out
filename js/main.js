document.getElementById("login").addEventListener("click", login);
document.getElementById("register").addEventListener("click", register);
document.getElementById("search").addEventListener("click", search);
document.getElementById("addNewVenue").addEventListener("click", addNewVenue);
document.getElementById("currentlySelectedRecommend").addEventListener("click", recommendVenue);
document.getElementById("currentlySelectedReview").addEventListener("click", reviewVenue);
function sessionStart(){
    $.ajax({
        url: "php/startSession.php",
        type: "POST",
    });
}
sessionStart();


function login(){
    let username= document.getElementById("username").value;
    let password= document.getElementById("password").value;
    $.ajax({
        url: "php/login.php",
        type: "POST",
        data: {
            username: username,
            password: password
        },
        success: function (data) {
            console.log(data)
        },
        error: function (data) {
            console.log(data)
        }
    });
}
function register(){
    let username= document.getElementById("username").value;
    let password= document.getElementById("password").value;
    $.ajax({
        url: "php/register.php",
        type: "POST",
        data: {
            username: username,
            password: password
        },
        success: function (data) {
            console.log(data)
        },
        error: function (data) {
            console.log(data)
        }
    });
}
function search(){
    let keyword= document.getElementById("keyword").value;
    let type= document.getElementById("type").value;
    document.getElementById('searchResults').innerHTML= "";
    $.ajax({
        url: "php/search.php",
        type: "POST",
        data: {
            keyword: keyword,
            type: type
        },
        success: function (data) {


            searchResults(data);
            // document.getElementById('searchResults').innerHTML+= data;

        },
        error: function (data) {
            console.log(data)
        }
    });
}
function addNewVenue(){
    let venueName= document.getElementById("newVenueName").value;
    let venueDescription= document.getElementById("newVenueDesc").value;
    let venueType= document.getElementById("newVenueType").value;
    $.ajax({
        url: "php/addVenue.php",
        type: "POST",
        data: {
            venueName: venueName,
            venueDescription: venueDescription,
            venueType: venueType
        },
        success: function (data) {
            console.log(data);

        },
        error: function (data) {
            console.log(data)
        }
    });
}
function searchResults(data){
    var venues= data.split(",");
    venues.pop();
    var i=0;
    while (i<venues.length){
        var venue=venues[i].split(":");
        var searchResult= "<li><a class=venue  id=venue" + venue[1] + ">"+venue[0]+"</a></li>";
        document.getElementById('searchResults').innerHTML+= searchResult;
        i++
    }

    document.querySelectorAll(".venue").forEach(function(elem) {
        elem.addEventListener("click", function() {
            venueDetails(this.id);
            // console.log(this.id);
        });
    });
}
function venueDetails(id) {
    let venueId= id.replace( /^\D+/g, '');
    $.ajax({
        url: "php/venueDetails.php",
        type: "POST",
        data: {
            id: venueId
        },
        success: function (data) {
            var currentlySelectedData=data.split("|")
            var currentlySelected=currentlySelectedData[0].split("/");
            var currentlySelectedReviews= currentlySelectedData[1].split("/");
            currentlySelectedReviews.pop();
            console.log(currentlySelectedData);
            console.log(currentlySelected);
            console.log(currentlySelectedReviews);
            document.getElementById("currentlySelectedName").innerText= currentlySelected[0];
            document.getElementById("currentlySelectedType").innerText= currentlySelected[1];
            document.getElementById("currentlySelectedDesc").innerText= currentlySelected[2];
            document.getElementById("currentlySelectedRecommendations").innerText= currentlySelected[3]+" Recommendations";
            document.getElementById("currentlySelectedRecommend").value= "recommend"+venueId;
            document.getElementById("currentlySelectedReviews").innerHTML= "";
            var i =0;
            while (i<currentlySelectedReviews.length){
                document.getElementById("currentlySelectedReviews").innerHTML+= "<li>"+currentlySelectedReviews[i]+"";
                i++
            }
            document.getElementById("currentlySelectedReview").value= "review"+venueId;
            document.getElementById("currentlySelected").style.display="block";
            console.log(id);
        },
        error: function (data) {
            console.log(data)
        }
    });
}
function recommendVenue() {
    let venueId= document.getElementById("currentlySelectedRecommend").value.replace( /^\D+/g, '');
    $.ajax({
        url: "php/recommendVenue.php",
        type: "POST",
        data: {
            id: venueId
        },
        success: function (data) {
            console.log(data);
            venueDetails(venueId)
        },
        error: function (data) {
            console.log(data)
        }
    });
}
function reviewVenue() {
    let venueId= document.getElementById("currentlySelectedReview").value.replace( /^\D+/g, '');
    let venueReview= document.getElementById("venueReview").value;
    $.ajax({
        url: "php/reviewVenue.php",
        type: "POST",
        data: {
            id: venueId,
            review: venueReview
        },
        success: function (data) {
            console.log(data);
            venueDetails(venueId)
        },
        error: function (data) {
            console.log(data)
        }
    });
}
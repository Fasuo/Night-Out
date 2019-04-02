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
            console.log(data);
        }
    });
}
function addNewVenue(){
    let venueName= document.getElementById("newVenueName").value;
    let venueDescription= document.getElementById("newVenueDesc").value;
    let venueType= document.getElementById("newVenueType").value;
    $.ajax({ //starts the ajax request
        url: "php/addVenue.php", //location of the php script
        type: "POST", //method
        data: { //data to be submitted
            venueName: venueName, //First attribute is variable name for php second one is js variable that the name will be attached to
            venueDescription: venueDescription,
            venueType: venueType
        } // closing tag for data object
    }); // closing tag for the request
}
function searchResults(data){
    var venues= data.split(",");
    venues.pop();
    var i=0;
    while (i<venues.length){
        var venue=venues[i].split(":");
        var searchResult= "<li><a href=#currentlySelected class=venue  value=" + venue[1] + ">"+venue[0]+"</a></li>";
        document.getElementById('searchResults').innerHTML+= searchResult;
        i++
    }

    document.querySelectorAll(".venue").forEach(function(elem) {
        elem.addEventListener("click", function() {
            venueDetails(this.getAttribute('value'));
        });
    });
}
function venueDetails(venueId) {
    $.ajax({
        url: "php/venueDetails.php",
        type: "POST",
        data: {
            id: venueId
        },
        success: function (data) {
            console.log(data);
            var currentlySelectedData=data.split("|")
            var currentlySelected=currentlySelectedData[0].split("/");
            var currentlySelectedReviews= currentlySelectedData[1].split("/");
            currentlySelectedReviews.pop();
            document.getElementById("currentlySelectedName").innerText= currentlySelected[0];
            document.getElementById("currentlySelectedType").innerText= currentlySelected[1];
            document.getElementById("currentlySelectedDesc").innerText= currentlySelected[2];
            document.getElementById("currentlySelectedRecommendations").innerText= currentlySelected[3]+" Recommendations";
            document.getElementById("currentlySelectedRecommend").value= venueId;
            document.getElementById("currentlySelectedReviews").innerHTML= "";
            var i =0;
            while (i<currentlySelectedReviews.length){
                document.getElementById("currentlySelectedReviews").innerHTML+= "<li>"+currentlySelectedReviews[i]+"</li>";
                i++
            }
            document.getElementById("currentlySelectedReview").value= venueId;
            document.getElementById("currentlySelected").style.display="block";
            bookingdetails(venueId);
        }
    });
}
function recommendVenue(venueId) {
    $.ajax({
        url: "php/recommendVenue.php",
        type: "POST",
        data: {
            id: venueId
        },
        success: function (data) {
            venueDetails(venueId);
        }
    });
}
function reviewVenue(venueId) {

    let venueReview= document.getElementById("venueReview").value;
    $.ajax({
        url: "php/reviewVenue.php",
        type: "POST",
        data: {
            id: venueId,
            review: venueReview
        },
        success: function (data) {
        }
    });
}
function bookingdetails(id) {
    $.ajax({
        url: "php/booking.php",
        type: "POST",
        data: {
            id: id
        },
        success: function (data) {
            document.getElementById("booking").innerHTML="";
            var noOfDates= data.split("|");
            noOfDates.pop();
            console.log(noOfDates);
            i=0;
            while(i<noOfDates.length){
                var availability=1;
                var select="";
                while(availability<=noOfDates[i].split(":")[1]){
                    select+="<option value="+availability+">"+availability+"</option>";
                    availability+=1;
                }
                var date="<div class='row'>"+"<div class='col-4'>"+parseFloat(i+1)+"</div>"+"<div class='col-4'><select id='date"+parseFloat(i+1)+"'>"+
                    select +"</select></div>"+"<div class='col-4'><button onclick='book("+id+","+parseFloat(i+1)+")' class='btn btn-primary'>Book</button></div>"+"</div>"
                document.getElementById("booking").innerHTML+=date;
                i+=1;
            }
        },
    });
}
function book(venueId, date) {
    var selectId="date"+date;
    var seats=document.getElementById(selectId).value;
    $.ajax({
        url: "php/book.php",
        type: "POST",
        data: {
            venueId: venueId,
            date: date,
            seats:seats
        },
        success: function (data) {
            venueDetails(venueId)
        }
    });
}
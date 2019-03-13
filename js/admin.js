function approveReview(reviewId) {
    $.ajax({
        url: "php/approveReviews.php",
        type: "POST",
        data: {
            id: reviewId
        },
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            console.log(data)
        }
    });
}
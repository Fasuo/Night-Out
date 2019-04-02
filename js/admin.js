function approveReview(reviewId) {
    $.ajax({
        url: "php/approveReviews.php",
        type: "POST",
        data: {
            id: reviewId
        }
    });
}
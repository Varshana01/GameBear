$(xml).find("review").each(function() {
    var id = $(this).attr("id");
    var username = $(this).find("username").text();
    var text = $(this).find("text").text();
    var review = {id: id, username: username, text: text};
    reviews.push(review);
  });

  // Display the first set of reviews
  displayReviews(startIndex, reviewsPerPage, reviews);
  startIndex += reviewsPerPage;

  // Add a click event listener to the "Read More Reviews" button
  $("#readMoreBtn").click(function() {
    // Display the next set of reviews
    displayReviews(startIndex, reviewsPerPage, reviews);
    startIndex += reviewsPerPage;

    // Hide the button if all reviews have been displayed
    if (startIndex >= reviews.length) {
      $("#readMoreBtn").hide();
    }
});
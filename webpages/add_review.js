$(document).ready(function(){
    $("#addReviewForm").submit(function(e){
        e.preventDefault();

        var productId = $("#productId").val();
        var username = $("#username").val();
        var rating = $("#rating").val();
        var comment = $("#comment").val();

        $.ajax({
            url: "add_review.php",
            type: "POST",
            data: {
                productId: productId,
                username: username,
                rating: rating,
                comment: comment
            },
            dataType: "json",
            success: function(response){
                if(response.status == 'success'){
                    alert(response.message);
                    // Clear form fields
                    $("#productId").val("");
                    $("#username").val("");
                    $("#rating").val("");
                    $("#comment").val("");
                } else {
                    alert(response.message);
                }
            },
            error: function(){
                alert("Error occurred while adding review");
            }
        });
    });
});

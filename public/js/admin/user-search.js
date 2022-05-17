$(function() {
    // search users within the platform
    $("#user-search").on("keyup", function() {
        // lowercase the input on the search field
        var input = $(this).val().toLowerCase();
    
        // hide the irrelevant list items 
        $(".all-users-list li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(input) > -1)
        });
    });
});

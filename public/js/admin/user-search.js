$(function() {
    $("#user-search").on("keyup", function() {
        // lowercase the input on the search field
        var value = $(this).val().toLowerCase();
    
        // hide the irrelevant list items 
        $(".all-users-list li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

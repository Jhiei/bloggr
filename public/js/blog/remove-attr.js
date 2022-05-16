$(function() {
    var content = $('.main-blog-content-container');

    // disable users from editing content when viewing blog
    $(window).on('load', function() {
        content.children().removeAttr('contenteditable');
    })
});
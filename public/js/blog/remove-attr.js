$(function() {
    var content = $('.main-blog-content-container');

    $(window).on('load', function() {
        content.children().removeAttr('contenteditable');
    })
});
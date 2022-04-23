$(function() {
    var content = $('.blog-content-container');

    $(window).on('load', function() {
        content.children().removeAttr('contenteditable');
    })
});
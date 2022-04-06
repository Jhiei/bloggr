$(function() {
    var content = $('.blog-content');

    $(window).on('load', function() {
        content.children().removeAttr('contenteditable');
    })
});
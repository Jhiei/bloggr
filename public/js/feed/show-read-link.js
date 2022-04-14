$(function() {
    var container = $('.feed-blogs-tnail');
    var modal = $('.feed-blogs-tnail-darken');

    container.hover(function() {
        $(this).find(modal).fadeIn(200);
    });

    container.on('mouseleave', function() {
        $(this).find(modal).fadeOut(200);
    });
});
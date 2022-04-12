$(function() {
    var container = $('.feed-blogs-tnail');
    var modal = $('.feed-blogs-tnail-darken');

    container.hover(function() {
        modal.fadeIn(200);
    });

    container.on('mouseleave', function() {
        modal.fadeOut(200);
    });
});
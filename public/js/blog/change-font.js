$(function() {
    var dropdown = $('#blog-font');
    var body = $('.content');

    // change font of whole body content when creating blog
    dropdown.on('change', function() {
        body.attr('style', 'font-family: ' + $(this).val() + ', sans-serif;');
    })
});
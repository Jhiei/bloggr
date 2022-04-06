$(function() {
    var dropdown = $('#blog-font');
    var body = $('.content');

    dropdown.on('change', function() {
        body.attr('style', 'font-family: ' + $(this).val() + ', sans-serif;');
    })
});
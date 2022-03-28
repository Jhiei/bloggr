$(function() {
    var btn = $('.submit-btn');
    var form = $('.details-blog-form');
    var content = $('.content');
    var main = $('.content-body');

    btn.on('click', function() {
        main.val(content.html());

        form.submit();
    });
});
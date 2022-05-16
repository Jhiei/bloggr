$(function() {
    var btn = $('.submit-btn');
    var form = $('.details-blog-form');
    var content = $('.content');
    var main = $('.content-body');

    var font_select = $('.font-select');
    var topic_select = $('.topic-select');

    btn.on('click', function(e) {
        main.val(content.html());

        form.submit();
    });

    form.on('submit', function(e) {
        if (font_select.val() == "" || topic_select.val() == "") {
            e.preventDefault();
        }
    });
});
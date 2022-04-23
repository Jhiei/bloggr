$(function() {
    var topic = $('.topic-tags');
    var tag_id = $('#tag-id');
    var form = $('.topic-form');

    topic.on('click', function() {
        $(this).fadeOut(500);

        tag_id.val($(this).next().text());

        form.submit();
    });
});
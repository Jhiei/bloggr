$(function() {
    var topic = $('.topic-tags');
    var tag_id = $('#tag-id');
    var form = $('.topic-form');

    topic.on('click', function() {
        tag_id.val($(this).next().text());

        form.submit();
    });
});
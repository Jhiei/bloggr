$(function() {
    var topic = $('.topic-tags');
    var tag_id = $('#tag-id');
    var form = $('.topic-form');

    // hide topic on click and submit form with AJAX
    topic.on('click', function() {
        $(this).fadeOut(500);

        tag_id.val($(this).next().text());

        form.submit();
    });
});
$(function() {
    var speed = 200;
    var follow_btn = $('.follow-btn');
    var unfollow_btn = $('.unfollow-btn');

    var form = $('.user-details-follow-form');
    form.submit(function(e) {
        e.preventDefault();
    });

    follow_btn.on('click', function() {
        $(this).fadeToggle(speed);
        unfollow_btn.delay(speed).fadeToggle(speed);
    });

    unfollow_btn.on('click', function() {
        $(this).fadeToggle(speed);
        follow_btn.delay(speed).fadeToggle(speed);
    });
});
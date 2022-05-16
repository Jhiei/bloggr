$(function() {
    var speed = 200; // animation speed
    var follow_btn = $('.follow-btn');
    var unfollow_btn = $('.unfollow-btn');

    // prevent form from submitting
    var form = $('.user-details-follow-form');
    form.submit(function(e) {
        e.preventDefault();
    });

    // follow user 
    follow_btn.on('click', function() {
        $(this).fadeToggle(speed);
        // show unfollow button
        unfollow_btn.delay(speed).fadeToggle(speed);
    });

    // unfollow user
    unfollow_btn.on('click', function() {
        $(this).fadeToggle(speed);
        // show follow button
        follow_btn.delay(speed).fadeToggle(speed);
    });
});
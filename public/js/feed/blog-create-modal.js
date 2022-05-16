$(function() {
    var modal = $('.blog-create-modal');
    var btn = $('.feed-write-intro');
    var close = $('.cancel-btn');

    // display modal to create blog
    btn.on('click', function() {
        // adjust modal top value and remove scrollable function
        modal.css('top', $(window).scrollTop());
        $('body').css('overflow-y', 'hidden');

        modal.fadeIn(300);
    });

    // close blog modal
    close.on('click', function() {
        // enable scrollable
        $('body').css('overflow-y', 'visible');

        modal.fadeOut(300);
    });
});
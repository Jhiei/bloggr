var modal = $('.blog-create-modal');
var btn = $('.feed-write-intro');
var close = $('.cancel-btn');

btn.on('click', function() {
    modal.css('top', $(window).scrollTop());
    $('body').css('overflow-y', 'hidden');

    modal.fadeIn(300);
});

close.on('click', function() {
    $('body').css('overflow-y', 'visible');

    modal.fadeOut(300);
});
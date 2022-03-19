var modal = $('.blog-create-modal');
var btn = $('.feed-write-intro');
var close = $('.cancel-btn');

btn.on('click', function() {
    modal.fadeIn(300);
});

close.on('click', function() {
    modal.fadeOut(300);
});
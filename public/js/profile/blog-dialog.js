$(function() {
    var modal = $('.blog-modal');
    var blog = $('.blog-details-item');
    var close = $('.blog-modal-close-btn');

    blog.on('click', function() {
        var img = $(this).find('.blog-details-item-img-dialog');
        var title = $(this).find('.blog-details-item-title');
        var desc = $(this).find('.blog-details-item-desc');
        var link = $(this).find('.blog-details-item-link');

        var imgToRep = $('.blog-modal-img img');
        var titleToRep = $('.blog-modal-text-heading');
        var descToRep = $('.blog-modal-text-desc');
        var linkToRep = $('.blog-modal-link');

        imgToRep.attr('src', img.attr('src'));
        titleToRep.text(title.text());
        descToRep.text(desc.text());
        linkToRep.attr('href', link.attr('href'));

        modal.css('top', $(window).scrollTop());
        $('body').css('overflow-y', 'hidden');

        modal.fadeIn(200);
    });

    close.on('click', function() {
        $('body').css('overflow-y', 'visible');
        modal.fadeOut(200);
    });
});
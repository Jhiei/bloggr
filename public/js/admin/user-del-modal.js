$(function() {
    var delBtn = $('.users-delete-btn');
    var modal = $('.del-modal');
    var closeBtn = $('.del-close-modal');

    delBtn.on('click', function() {
        var id = $(this).parent().siblings('.users-id').text();
        var del_id = $('.del-user-id');

        del_id.val(id);

        $('body').css('top', $(window).scrollTop());
        $('body').css('overflow-y', 'hidden');
        modal.fadeIn(200);
    });

    closeBtn.on('click', function() {
        $('body').css('top', $(window).scrollTop());
        $('body').css('overflow-y', 'visible');
        modal.fadeOut(200);
    });
});
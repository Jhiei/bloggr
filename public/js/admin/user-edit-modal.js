$(function() {
    var openBtn = $('.users-edit-btn');
    var modal = $('.edit-modal');
    var input_id = $('.user-id-to-rep');

    openBtn.on('click', function() {
        var id = $(this).parent().siblings('.users-id').text();

        modal.fadeIn(200);

        input_id.val(id);
    });
});
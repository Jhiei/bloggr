$(function() {
    var img_container = $('.user-details-img');
    var edit_profile_btn = $('.user-details-img-edit-btn');
    var modal = $('.upload-profile-modal');
    var close_btn = $('.close-modal-btn');

    img_container.hover(function() {
        edit_profile_btn.fadeIn(200);
    });

    img_container.on('mouseleave', function() {
        edit_profile_btn.fadeOut(200);
    });

    edit_profile_btn.on('click', function() {
        modal.fadeIn(200);
    });

    close_btn.on('click', function() {
        modal.fadeOut(200);
    });
});
$(function() {
    var editBtn = $('.users-edit-btn');
    var cancelBtn = $('.edit-close-modal');
    var modal = $('.edit-modal');

    var input_id = $('.user-id-to-rep');
    var input_fname = $('.user-fname-to-rep');
    var input_lname = $('.user-lname-to-rep');
    var input_username = $('.user-username-to-rep');
    var input_email = $('.user-email-to-rep');
    var input_type = $('.user-type-to-rep');

    editBtn.on('click', function() {
        var id = $(this).parent().siblings('.users-id').text();
        var name = $(this).parent().siblings('.users-name').text();
        var split_name = name.split(" ");
        var username = $(this).parent().siblings('.users-username').text();
        var email = $(this).parent().siblings('.users-email').text();
        var user_type = $(this).parent().siblings('.users-type').text();

        input_id.val(id);
        input_fname.val(split_name[0]);
        input_lname.val(split_name[1]);
        input_username.val(username);
        input_email.val(email);
        input_type.val(user_type);

        modal.css('top', $(window).scrollTop());
        $('body').css('overflow-y', 'hidden');
        modal.fadeIn(200);
    });

    cancelBtn.on('click', function() {
        $('body').css('overflow-y', 'visible');
        modal.fadeOut(200);
    });
});
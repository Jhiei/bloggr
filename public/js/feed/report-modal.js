$(function() {
    var btn = $('.feed-blogs-menu-btn');
    var menu = $('.feed-blogs-menu');
    var reportBtn = $('.feed-blogs-menu-option');
    var rep_modal = $('.report-modal');
    var cancelBtn = $('.report-cancel-btn');

    var input_user_id = $('.input-user-id');
    var input_blog_id = $('.input-blog-id');
    
    btn.on('click', function() {
        $(this).siblings(menu).slideToggle(300);
    });

    // open report modal through a dropdown button
    reportBtn.on('click', function() {
        var user_id = $(this).siblings('.feed-blogs-menu-option-user-id').text();
        var blog_id = $(this).siblings('.feed-blogs-menu-option-blog-id').text();

        input_user_id.val(user_id);
        input_blog_id.val(blog_id);

        rep_modal.css('top', $(window).scrollTop());
        rep_modal.css('overflow-y', 'hidden');
        rep_modal.fadeIn(200);
    });

    menu.on('mouseleave', function() {
        $(this).slideToggle(300);
    });

    cancelBtn.on('click', function() {
        rep_modal.css('overflow-y', 'visible');
        rep_modal.fadeOut(200);
    });
});
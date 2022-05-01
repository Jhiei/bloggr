$(function() {
    var user_btn = $('.reports-utility button');
    var open_user_btn = $('.user-reports-heading-container ion-icon');

    open_user_btn.on('click', function() {
        $(this).parent().siblings().slideToggle(200);
    });

    user_btn.on('click', function() {
        $(this).parent().parent().next('.user-report-content').slideToggle(200);
    });

    var blog_btn = $('.reports-utility button');
    var open_blog_btn = $('.blog-reports-heading-container ion-icon');

    open_blog_btn.on('click', function() {
        $(this).parent().siblings().slideToggle(200);
    });

    blog_btn.on('click', function() {
        $(this).parent().parent().next('.blog-report-content').slideToggle(200);
    });
});
$(function() {
    var drop = $('.drop-container');
    var profile = $('.main-hdr-nav-profile-img');
    
    profile.on('click', function() {
        drop.slideToggle(200);
    });

    var logout_btn = $('.logout-btn');
    var logout = $('.logout-form');

    logout_btn.on('click', function() {
        logout.submit();
    });
});

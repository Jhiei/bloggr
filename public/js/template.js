$(function() {
    var drop = $('.drop-container');
    var profile = $('.main-hdr-nav-profile-img');
    
    // dropdown container containing links to other pages
    profile.on('click', function() {
        drop.slideToggle(200);
    });

    // logout button
    var logout_btn = $('.logout-btn');
    var logout = $('.logout-form');

    // logout user on click
    logout_btn.on('click', function() {
        logout.submit();
    });
});

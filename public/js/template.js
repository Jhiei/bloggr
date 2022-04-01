$(function() {
    var drop = $('.drop-container');
    var profile = $('.main-hdr-nav-profile-img');
    
    profile.on('click', function() {
        drop.slideToggle(200);
    });
});

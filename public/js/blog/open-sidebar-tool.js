$(function() {
    var container = $('.sidebar-tools-container');
    var headings = $('.tool-heading');
    var tools = $('.tool');

    // open the sidebar to show tools on hover
    container.on('mouseenter', function() {
        $(this).animate({
            width : '225px'
        }, 300);

        tools.animate({
            padding: '10px',
            marginBottom : '0px'
        }, 300);

        headings.fadeIn(300);
    });

    // close the sidebar to hide tools on mouse leave
    container.on('mouseleave', function() {
        $(this).animate({
            width : '100%'
        }, 300);

        tools.animate({
            padding: '0px',
            marginBottom : '10px'
        }, 300);

        headings.fadeOut(300);
    });
});
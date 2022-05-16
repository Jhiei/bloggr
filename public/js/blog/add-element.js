$(function() {
    // variables regarding blog creation
    var body = $('.content');

    var heading_tool = $('.heading');
    var paragraph_tool = $('.paragraph');

    // add new element on click
    heading_tool.on('click', function() {
        body.append(
            "<h2 class='heading-element elem' contenteditable>" +
            "</h2>"
            );

        // select the 2nd last element in the body
        var penulElem = body.children().last().prev();
        if (penulElem.text() == "") {
            penulElem.remove();
        }

        // focus on last element
        $('.heading-element').focus();
    });

    // add new element on click
    paragraph_tool.on('click', function() {
        body.append(
            "<p class='paragraph-element elem' contenteditable>" +
            "</p>"
            );
    
        // select the 2nd last element in the body
        var penulElem = body.children().last().prev();
        if (penulElem.text() == "") {
            penulElem.remove();
        }

        // focus on last element
        $('.paragraph-element').focus();
    });
});
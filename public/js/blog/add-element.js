$(function() {
    var body = $('.content');

    var heading_tool = $('.heading');
    var paragraph_tool = $('.paragraph');

    var penulElem = body.children().last().prev();

    heading_tool.on('click', function() {
        body.append(
            "<h2 class='heading-element elem' contenteditable>" +
            "</h2>"
            );

        if (penulElem.text() == "") {
           penulElem.remove();
        }

        $('.heading-element').focus();
    });

    paragraph_tool.on('click', function() {
        body.append(
            "<p class='paragraph-element elem' contenteditable>" +
            "</p>"
            );
    
        if (penulElem.text() == "") {
            penulElem.remove();
        }

        $('.paragraph-element').focus();
    });
});
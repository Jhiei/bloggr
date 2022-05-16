$(function() {
    var fields = $('.sign-in-form-input-field, .sign-up-form-input-field');

    // hide labels upon focus
    fields.find('input, textarea').on('focusin', function() {
        $(this).siblings().slideUp(200);
    });

    fields.find('input, textarea').on('focusout', function() {
        $(this).siblings().slideDown(200);
    });
});
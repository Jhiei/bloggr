$(function() {
    var fields = $('.blog-create-modal-form-input-field');

    fields.find('input, textarea').on('focusin', function() {
        $(this).siblings().slideUp(200);
    });

    fields.find('input, textarea').on('focusout', function() {
        $(this).siblings().slideDown(200);
    });
});
$(function() {
    $('#lang').change(function() {
        // console.log($(this).val());
        window.location = '/language/change?lang=' + $(this).val();
    })
})
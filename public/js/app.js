$(document).ready(function() {
    $("#childSearch").on('change', function() {
        $(this).parents("form").submit();
    });

    $('.js-select2').select2();
});

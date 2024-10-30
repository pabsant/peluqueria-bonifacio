$(document).ready(function () {
    // Animación minimalista en el logo del navbar
    $('.navbar-brand').hover(
        function () {
            $(this).css('color', '#555')
        },
        function () {
            $(this).css('color', 'black')
        }
    )
})

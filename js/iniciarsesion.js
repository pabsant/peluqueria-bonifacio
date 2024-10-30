$(document).ready(function () {
    // Manejar el evento de envío del formulario
    $('#miFormulario').on('submit', function (event) {
        var email = $('#email')
        var contrasena = $('#contrasena')
        var isValid = true

        // Validar el campo de correo electrónico
        if (email.val().trim() === '') {
            event.preventDefault()
            alert('El campo nombre no puede estar vacío.')
            email.css('border', '2px solid red')
            isValid = false
        } else {
            email.css('border', '')
        }

        // Validar el campo de contraseña
        if (contrasena.val().trim() === '') {
            event.preventDefault()
            alert('El campo contraseña no puede estar vacío.')
            contrasena.css('border', '2px solid red')
            isValid = false
        } else {
            contrasena.css('border', '')
        }
    })
})

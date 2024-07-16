$('#loginForm').on('submit', function(event) {
    event.preventDefault(); // Impede o envio do formulário

    $.ajax({
        type: 'POST',
        url: 'login.php',
        data: $(this).serialize(),
        success: function(data) {
            if (data == 'success') {
                window.location.href = 'dashboard';
            } else {
                // Limpa os campos de login e senha
                $('#login').val('');
                $('#senha').val('');
            // Exibe uma mensagem de erro
            var mensagemErro = $('<div>').addClass('mensagem-erro').text('Login ou senha incorretos.');
            $('body').append(mensagemErro);

            // Adiciona a classe 'mostrar' para tornar a mensagem de erro visível
            mensagemErro.addClass('mostrar');

            // Remove a mensagem de erro após 2 segundos
            setTimeout(function() {
                mensagemErro.removeClass('mostrar');

                // Remove a mensagem de erro do DOM após a transição de opacidade
                setTimeout(function() {
                    mensagemErro.remove();
                }, 500);
            }, 2000);

            }
        }
    });
});
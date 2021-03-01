$(document).ready(function() {
    $('#formulario').on('submit', function(e) {
        e.preventDefault();
        let formulario = $(this);
        $.ajax({
            method: formulario.attr('method'),
            data: formulario.serialize(),
            url: formulario.attr('action'),
            success: function(escolha) {
                $('#container').append(`
                    <p>&nbsp;&nbsp;${escolha.mensagem}</p>
                `);
                window.location.href = escolha.url;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#container').append(`
                    <p>&nbsp;&nbsp;${jqXHR.responseJSON.mensagem}</p>
                `);
            }
        })
    });
});
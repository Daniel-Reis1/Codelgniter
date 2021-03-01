$(document).ready(function () {
    $('.deletaBtn').click(function (ev) {
        ev.preventDefault();
        ev.stopPropagation();
        var href = $(this).attr('href');
        $('body').append(`<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" bg-danger text-while>EXCLUIR USUÁRIO</h5>
                        <button type="button" class="close cancelarModal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir o item selecionado?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary cancelarModal" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary text-white" id="dataConfirmOk">Apagar</a>
                    </div>
                </div>
            </div>
        `);
        $('#confirm-delete').modal('show');
        $('#dataConfirmOk').attr('href', href);
        $('.cancelarModal').click(function () {
            $('#confirm-delete').modal('hide');
            setTimeout(function() {
                $('#confirm-delete').remove();
            }, 1000);
        });
        //return false;
    });
});
<div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('assets.update') }}" method="POST">
            @csrf
            <div class="modal-body">
                <input type="hidden" value="" name="idasset" id="idasset">
                <div class="col-md-12 mt-3">
                    <label for="inputEmail4" class="form-label">Km Final</label>
                    <input name="kmfim" type="text" class="form-control" id="inputEmail4">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Fechar</button>
            </div>
        </form>
    </div>
</div>
</div>

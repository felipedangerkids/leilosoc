<div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="row g-3" action="{{ route('assets.update') }}" method="POST">
                @csrf
                <input type="hidden" value="" name="idasset" id="idasset">
                <div class="col-md-12 mt-3">
                    <label for="inputEmail4" class="form-label">Km Final</label>
                    <input name="kmfim" type="text" class="form-control" id="inputEmail4">
                </div>
                <div class="botoes my-5 ">

                    <button type="submit" class="btn btn-success">SALVAR</button>
                </div>
                <div class="modal-footer col-md-12">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
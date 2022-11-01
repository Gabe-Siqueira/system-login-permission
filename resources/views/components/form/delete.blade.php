<div id="{{$modal}}" class="{{$modal}} fade" rolw="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deseja realmente excluir este registro?</h5>
            </div>
            <div class="modal-footer">
                <form name="delete-form" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Sim</button>
                </form>
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="{{$modal}}">Cancelar</button>
            </div>
        </div>
    </div>
</div>

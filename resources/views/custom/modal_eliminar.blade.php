<!-- Modal -->
<div class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar este registro?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
{{--            <div class="modal-body">--}}
{{--                <p>ID: @{{id}}</p>--}}
{{--            </div>--}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <form :action="urlaeliminar" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Si</button>
                </form>

            </div>
        </div>
    </div>
</div>

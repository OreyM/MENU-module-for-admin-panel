<div id="menu-type-destroy-modal" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ trans('menus::modal.destroy-menu-type-title') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                {{ trans('menus::modal.destroy-menu-type-body', ['name' => $typeName]) }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">
                    {{ trans('menus::modal.button-cancel') }}
                </button>
                <form action="{{ route("{$adminUrl}.menu.type.destroy", $type) }}" method="post">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger waves-effect waves-light">
                        {{ trans('menus::modal.button-delete') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

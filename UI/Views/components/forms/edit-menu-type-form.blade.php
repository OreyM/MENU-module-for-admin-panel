<div class="card">
    <div class="card-header">
        <button type="submit"
                class="btn btn-primary waves-effect waves-light">{{ trans('menus::form.update-menu') }}</button>

        <button type="button" class="btn btn-danger waves-effect waves-light float-right"
                data-toggle="modal" data-target="#menu-type-destroy-modal">
            <i class="fas fa-trash-alt"></i>
        </button>
    </div>
    <div class="card-body">
        <form action="" method="get">
            <div class="form-group mb-3">
                <label class="mb-1">{{ trans('menus::form.menu-name') }}</label>
                <p class="text-muted m-b-15 font-13">
                    {!! trans('menus::form.menu-name-length', ['count' => 25]) !!}
                </p>
                <input type="text" class="form-control max-length"
                       maxlength="25" name="name" id="name" value="{{ $typeName ?? old('name') }}" />
            </div>
        </form>
    </div>
</div>

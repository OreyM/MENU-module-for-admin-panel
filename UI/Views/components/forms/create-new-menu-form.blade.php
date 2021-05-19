<div class="card">
    <div class="card-header">
        <button type="submit"
                class="btn btn-primary waves-effect waves-light">{{ trans('menus::form.create-new-menu') }}</button>
    </div>
    <div class="card-body">
        <div class="form-group mb-3">
            <label class="mb-1">{{ trans('menus::form.menu-name') }}</label>
            <p class="text-muted m-b-15 font-13">
                {!! trans('menus::form.menu-name-length', ['count' => 25]) !!}
            </p>
            <input type="text" class="form-control max-length"
                   maxlength="25" name="name" id="name" value="{{ $menu->type->name ?? old('name') }}" />
        </div>
    </div>
</div>

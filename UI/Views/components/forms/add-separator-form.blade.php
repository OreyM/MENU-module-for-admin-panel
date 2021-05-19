<div class="form-group mb-3">
    <label class="mb-1">{{ trans('menus::form.add-menu-element-separator-title') }}</label>
    <input type="text" class="form-control"
           name="name" value="{{ old('name') }}" />
</div>

<div class="form-group mb-3">
    <label class="mb-1">{{ trans('menus::form.add-menu-element-separator-class') }}</label>
    <input type="text" class="form-control"
           name="icon" placeholder="" />
</div>

<input type="hidden" name="is_separator" value="true">

<button type="submit" class="btn btn-primary waves-effect waves-light">
    {{ trans('menus::form.button-add-menu-element') }}
</button>

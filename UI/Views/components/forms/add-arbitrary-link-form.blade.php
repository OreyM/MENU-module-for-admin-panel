<div class="form-group mb-3">
    <label class="mb-1">{{ trans('menus::form.add-menu-element-custom-link-title') }}</label>
    <input type="text" class="form-control"
           name="name" value="{{ old('name') }}" />
</div>

<div class="form-group mb-3">
    <label class="mb-1">{{ trans('menus::form.add-menu-element-custom-link-url') }}</label>
    <input type="text" class="form-control"
           name="route" id="route" placeholder="{{ trans('menus::form.add-menu-element-custom-link-url-placeholder') }}" />
</div>

<div class="form-group mb-3">
    <label class="mb-1">{{ trans('menus::form.add-menu-element-custom-link-class') }}</label>
    <input type="text" class="form-control"
           name="icon" placeholder="la la-icon" />
</div>

<button type="submit" class="btn btn-primary waves-effect waves-light">
    {{ trans('menus::form.button-add-menu-element') }}
</button>

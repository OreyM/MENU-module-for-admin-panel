
<div class="card">
    <div class="card-header">
        <h4>{{ trans('menus::form.menus-list') }}</h4>
    </div>

    <div class="card-body">

        @php /** @var \App\Containers\Admin\Menus\Data\Mappers\MenuTypeMapper $menu */ @endphp
        <select class="selectpicker" name="type" data-style="btn-light">
            <option value="0">{{ trans('menus::form.menus-list-select-option') }}</option>
            @foreach($menuTypes as $menu)
                <option value="{{ $menu->type() }}">{{ $menu->name() }}</option>
            @endforeach
        </select>

    </div>
    <div class="card-footer">
        <button type="submit"
                class="btn btn-primary waves-effect waves-light">{{ trans('menus::form.button-select-menu') }}</button>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <button type="submit" class="btn btn-primary waves-effect waves-light">
            {{ trans('menus::form.button-store-menu') }}
        </button>
    </div>
    <div class="card-body" id="menu-nested">
        <v-menu-nested v-bind:menu="{{ $menu }}"/>
    </div>
</div>

@extends('templates::layouts.base')

@section('title', $title)
@section('title-postfix', $titlePostfix)

@section('body-class', '')

@section('modals')
    @include('menus::components.modals.destroy-menu-type')

    @foreach($menuForModal as $el)
        @include('menus::components.modals.destroy-menu-element', [
            'id' => $el->id,
            'name' => $el->name,
        ])
    @endforeach

@endsection

@section('content')

    <div class="content">

        <div class="container-fluid">

            @include('templates::components.breadcrumb')

            <div class="row">
                <div class="col-8">
                    <form action="{{ route("{$adminUrl}.menu.type.update", $type) }}" method="post">
                        @method('PUT')
                        {{ csrf_field() }}
                        @include('menus::components.forms.edit-menu-type-form')
                    </form>

                    <form action="{{ route("{$adminUrl}.menu.update", $type) }}" method="post">
                        @method('PUT')
                        {{ csrf_field() }}
                        @include('menus::components.forms.edit-menu-structure-form')
                    </form>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ trans('menus::form.add-menu-element-title') }}</h4>
                        </div>
                        <div class="card-body">
                            <div id="accordion" class="mb-3">

                                <div class="card mb-1">
                                    <div class="card-header accordion-element" id="headingOne">
                                        <h5 class="m-0">
                                            <a class="text-dark" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                                <i class="la la-link mr-1 text-primary"></i>
                                                {{ trans('menus::form.add-menu-element-separator') }}
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <form action="{{ route("{$adminUrl}.menu.add", $typeId) }}" method="post">
                                                {{ csrf_field() }}
                                                @include('menus::components.forms.add-separator-form')
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-1">
                                    <div class="card-header accordion-element" id="headingOne">
                                        <h5 class="m-0">
                                            <a class="text-dark" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                                <i class="la la-link mr-1 text-primary"></i>
                                                {{ trans('menus::form.add-menu-element-custom-link') }}
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <form action="{{ route("{$adminUrl}.menu.add", $typeId) }}" method="post">
                                                {{ csrf_field() }}
                                                @include('menus::components.forms.add-arbitrary-link-form')
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- To include library styles --}}
@section('lib-css')
@stop

{{-- To include special styles that are relevant for this page --}}
@section('special-css')
@stop

{{-- To include scripts of libraries --}}
@section('lib-js')
@stop

{{-- To include special scripts relevant to this page --}}
@section('special-js')
    <script src="{{ asset('js/admin/menu.init.js') }}"></script>
@stop

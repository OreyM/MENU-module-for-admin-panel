@extends('templates::layouts.base')

@section('title', $title)
@section('title-postfix', $titlePostfix)

@section('body-class', '')

@section('content')
    <div class="content">

        <div class="container-fluid">

            @include('templates::components.breadcrumb')

            <div class="row">
                <div class="col-8">
                    <form action="{{ route("{$adminUrl}.menu.type.create") }}" method="post">
                        {{ csrf_field() }}
                        @include('menus::components.forms.create-new-menu-form')
                    </form>
                </div>
                <div class="col-4">
                    <form action="{{ route("{$adminUrl}.menu.type.url") }}" method="get">
                        @include('menus::components.forms.select-menu-form')
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection

{{-- To include library styles --}}
@section('lib-css')
    <link href="{{ asset('libs/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('libs/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- To include special styles that are relevant for this page --}}
@section('special-css')
@stop

{{-- To include scripts of libraries --}}
@section('lib-js')
    <script src="{{ asset('libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('libs/select2/dist/js/select2.min.js') }}"></script>
@stop

{{-- To include special scripts relevant to this page --}}
@section('special-js')
    <script src="{{ asset('js/admin/max-length.select2.init.js') }}"></script>
@stop

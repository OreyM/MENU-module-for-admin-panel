@php/** *@var \App\Containers\Admin\Menus\Data\Objects\CmsMenuObject $link */ @endphp
<ul>
    @foreach($menu as $link)

        @if($link->is_separator)
            <li class="menu-title">
                {{ $link->name }}
            </li>
            @continue
        @endif

        <li class="@if(count($link->sub)) {{'drop-down'}} @endif">
            <a href="{{ $link->route }}">
                @if($link->icon)
                    <i class="{{ $link->icon }}"></i>
                @endif
                {{ $link->name }}
            </a>
            @if(count($link->sub))
                @include('menus::components.menus.' . $view, [
                    'menu'  => $link->sub,
                ])
            @endif
        </li>
    @endforeach
</ul>

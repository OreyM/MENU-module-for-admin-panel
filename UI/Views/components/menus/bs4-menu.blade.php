<ul class="navbar-nav">
    @php/** @var \App\Containers\Admin\Menus\Data\Objects\CmsMenuObject $link */ @endphp
    @foreach($menu as $link)
        @if(count($link->sub))
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    {{ $link->name }}
                </a>
                <div class="dropdown-menu">
                    @foreach($link->sub as $subLink)
                        <a class="dropdown-item" href="{{ $subLink->route }}">
                            {{ $link->name }}
                        </a>
                    @endforeach
                </div>
            </li>
        @else
            <li class="nav-item">
                <a href="{{ $link->route }}" class="nav-link">
                    {{ $link->name }}
                </a>
            </li>
        @endif
    @endforeach
</ul>

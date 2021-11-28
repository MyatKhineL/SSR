<li class="menu-item">
    <a href="{{ $link }}" class="menu-item-link {{ Request::url() == $link ? 'active' : '' }}">
        <span class="text-dark">
            <i class="{{ $class }} mr-2 fa-fw"></i>
            {{ $name }}
        </span>
        @if($counter >= 0)
        <span class="badge badge-pill bg-white shadow-sm text-primary">{{ $counter }}</span>
            @endif
    </a>
</li>

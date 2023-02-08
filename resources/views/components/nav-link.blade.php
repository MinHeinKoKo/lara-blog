<a class="nav-link {{ request()->url() === $url ? "active" : "" }}" aria-current="page" href="{{ $url }}">
    {{ $name }}
</a>

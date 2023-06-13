<ul class="nav justify-content-start">
    <li class="nav-item mx-4 {{ Request::is('profile*') ? 'border-bottom border-primary' : '' }}">
        <a class="nav-link text-dark" aria-current="page" href="{{ route('profile.index') }}">Profile</a>
    </li>
    <li class="nav-item mx-4 {{ Request::is('address*') ? 'border-bottom border-primary' : '' }}">
        <a class="nav-link text-dark" href="{{ route('address.index') }}">Address</a>
    </li>
    @if (auth()->user()->status_user->name === 'verified')
        <li class="nav-item mx-4">
            <a class="nav-link text-dark" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
    @endif
</ul>
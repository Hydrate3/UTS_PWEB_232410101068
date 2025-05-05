<nav class="navbar">
    <a href="{{ route('dashboard', ['username' => request()->query('username')]) }}">Dashboard</a>
    <a href="{{ route('pengelolaan') }}">Pengelolaan</a>
    <a href="{{ route('profile', ['username' => request()->query('username')]) }}">Profil</a>
</nav>
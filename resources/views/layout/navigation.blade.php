<nav>
    <div class="navbar">
        <div style="display: flex;">
            <form method="GET" action="{{ route('user.index') }}">
                @csrf

                <button>
                    Главная
                </button>
            </form>
            <form method="GET" action="{{ route('user.create') }}">
                @csrf

                <button>
                    Создать заявление
                </button>
            </form>
            @if(Auth::user()->isAdmin())
            <form method="GET" action="{{ route('admin-panel') }}">
                @csrf

                <button>
                    Админ панель
                </button>
            </form>
            @endif
        </div>
        <div style="display: flex; align-items: center; color:#000;">
            <p>{{ auth()->user()->name}}</p>
            <form method="GET" action="{{ route('auth.logout') }}">
                @csrf

                <button>
                    Log Out
                </button>
            </form>
        </div>
    </div>
</nav>
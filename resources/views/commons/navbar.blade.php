<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">YNショッピングサイト</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    {{-- カート --}}
                    <li class="nav-item">{!! link_to_route('cart.index', 'カート', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログアウトへのリンク --}}
                    <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                @else
                    {{-- 管理者用ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('seller.login', '管理者用ログイン', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                    {{-- カート --}}
                    <li class="nav-item">{!! link_to_route('cart.index', 'カート', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>
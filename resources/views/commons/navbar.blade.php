<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">ECサイト(仮)</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                {{-- 管理者ログインページへのリンク --}}
                <li class="nav-item">{!! link_to_route('seller.login', '管理者用ログイン', [], ['class' => 'nav-link']) !!}</li>
                {{-- カート --}}
                <li class="nav-item"><a herf=#>カート</a></li>
            </ul>
        </div>
    </nav>
</header>
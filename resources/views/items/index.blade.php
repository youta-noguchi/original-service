<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ECサイト</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
    
    {{-- @include('commons.navbar') --}}
    <header class="mb-4">
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            {{-- トップページへのリンク --}}
            <a class="navbar-brand" href="#">ECサイト(仮) 商品管理ページ</a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nav-bar">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                    {{-- ログアウト --}}
                    <li class="nav-item">{!! link_to_route('seller.logout', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                </ul>
            </div>
        </nav>
    </header>
    
    <div class="container">
        {{--　エラーメッセージ　--}}
        @include('commons.error_messages')
        
        {{-- @yield('content') --}}
        <h1>商品一覧</h1>
    
        {{-- 商品登録ページへのリンク --}}
        {!! link_to_route('items.create', '新規商品登録', [], ['class' => 'btn btn-primary']) !!}

        @if (count($items) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>名前</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        {{-- 商品詳細ページへのリンク --}}
                        <td>{!! link_to_route('items.show', $item->id, ['item' => $item->id]) !!}</td>
                        <td>{{ $item->item_name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    
        {{-- ページネーションのリンク --}}
        {{ $items->links() }}
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
</body>
</html>
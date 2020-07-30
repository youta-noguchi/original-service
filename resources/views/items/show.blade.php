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
        <h1>{{ $item->item_name }} の詳細ページ</h1>

        <table class="table table-bordered">
            <tr>
                <th>名前</th>
                <td>{{ $item->item_name }}</td>
            </tr>
            <tr>
                <th>画像</th>
                <td>{{ $item->image }}</td>
            </tr>
            <tr>
                <th>価格</th>
                <td>{{ $item->price }}</td>
            </tr>
            <tr>
                <th>商品説明</th>
                <td>{{ $item->content }}</td>
            </tr>
        </table>
    
        {{-- 商品編集ページへのリンク --}}
        {!! link_to_route('items.edit', 'この商品を編集', ['item' => $item->id], ['class' => 'btn btn-light']) !!}
    
        {{-- 商品削除フォーム --}}
        {!! Form::model($item, ['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
</body>
</html>

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
            <a class="navbar-brand" href="#">YNショッピングサイト 商品管理ページ</a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nav-bar">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                    {{-- ログアウト --}}
                    {!! Form::open(['route' => ['seller.logout'], 'method' => 'post']) !!}
                        {!! Form::submit('ログアウト', ['class' => "btn btn-danger btn-block"]) !!}
                    {!! Form::close() !!}
                </ul>
            </div>
        </nav>
    </header>
    
    <div class="container">
        {{--　エラーメッセージ　--}}
        @include('commons.error_messages')
        
        {{-- @yield('content') --}}
        <h1>{{ $item->item_name }} の編集ページ</h1>

        <div class="row">
            <div class="col-6">
                {!! Form::model($item, ['route' => ['items.update', $item->id], 'method' => 'put']) !!}

                    <div class="form-group">
                        {!! Form::label('item_name', '商品名:') !!}
                        {!! Form::text('item_name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('image', '画像:') !!}
                        {!! Form::file('image', null, []) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('price', '価格:') !!}
                        {!! Form::text('price', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', '商品説明:') !!}
                        {!! Form::textarea('content', null, ['class' => 'form-control', 'row' => '2']) !!}
                    </div>

                    {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
</body>
</html>
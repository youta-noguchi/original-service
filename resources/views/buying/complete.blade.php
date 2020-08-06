@extends('layouts.app')

@section('content')
    <div class="row">
        <h3 class="offset-sm-4 col-sm-4 mt-5">
            ご購入ありがとうございました。<br>
            ご購入内容はご登録いただいたメールアドレスからも<br>
            ご確認いただけます。
        </h3>
    </div>
    <div class="row">
        <div class="offset-sm-4 col-sm-4 mt-5">
            {!! link_to_route('top', 'トップページへ戻る', [], ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    
@endsection
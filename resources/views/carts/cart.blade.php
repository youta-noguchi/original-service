@extends('layouts.app')

@section('content')
    <h1>カート</h1>
    <div class="row">
        @if (count($carts) > 0)
            @foreach($carts as $cart)
            <div class="col-sm-2">
                <img src="/images/{{$cart->image}}" alt="" class="incart" width="150" height="150">
            </div>
            <div class="offset-sm-2 col-sm-8">
                <p>商品名: {{$cart->item_name}}</p><br>
                <p>価格：{{$cart->price * 1.1}}(税込)</p><br>
                <p>個数: {{$cart->quantity}}</p><br>
            </div>
            @endforeach
            <div>
                {{-- セッション削除フォーム --}}
                {!! Form::model($cart, ['route' => ['cart.destroy', $cart->id], 'method' => 'delete']) !!}
                    {!! Form::submit('カートを空にする', ['class' => 'btn btn-primary mb-4 ml-3']) !!}
                {!! Form::close() !!}
            </div>
        @endif
    </div>
    
    <div style="border-top: 1px solid">
        <div style="text-align: right">
            <p>合計金額：　¥ {{$sum}} 円(税込)</p>
            @if(session()->has('carts'))
                {!! link_to_route('order.create', 'レジに進む', [], ['class' => 'btn btn-primary']) !!}
                {!! link_to_route('login', 'ログインがまだの方', [], ['class' => 'btn btn-primary']) !!}
            @endif
        </div>
    </div>
@endsection
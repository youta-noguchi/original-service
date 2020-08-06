@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-5">
            <div class="card">
                <div class="card-header">
                    お届け先情報
                </div>
                <div class="card-body">
                    <p>お名前:　{{ $user->name }}</p><br>
                    <p>住所： {{ $user->address }}</p><br>
                    <p>お電話番号： {{ $user->phone }}</p><br>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    注文内容
                </div>
                <div class="card-body">
                    @foreach($carts as $cart)
                    <p>商品名: {{$cart->item_name}} </p><br>
                    <p>価格：{{$cart->price * 1.1}}</p><br>
                    <p>個数: {{$cart->quantity}}</p><br>
                    @endforeach
                </div>
            </div>
        </aside>
        <div class="offset-sm-2 col-sm-5">
            <div class="payment">
                <h3>お支払い方法</h3>
                <select>
                    <option selected>現金</option>
                    <option>クレジット</option>
                </select>
            </div>
            <div class="total-payment mt-5">
                <h3>合計金額</h3>
                <p>¥ {{ $sum }}円(税込)</p>
            </div>
            {!! link_to_route('order.store', '注文を確定する', [], ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
        
@endsection
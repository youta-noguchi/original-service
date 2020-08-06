@extends('layouts.app')

@section('content')

    <div class="row">
        <aside class="col-sm-4">
            <img src="/images/{{$item->image}}" alt="" class="incart" width="300" height="300">
        </aside>
        <div class="col-sm-8 mt-5">
            <p>{{ $item->item_name }}</p><br>
            <p>¥{{ $item->price * 1.1 }}円(税込)</p><br>
            <p>{{ $item->content }}</p>
            
            {!! Form::open(['route' => ['cart.store', $item->id]]) !!}
                {!! Form::selectRange('quantity', 1, 3) !!}
                {!! Form::submit('買い物カゴに入れる', ['class' => 'btn btn-primary btn-sm']) !!}
            {!! Form::close() !!}
  
            {!! link_to_route('cart.index', 'カートの中をみる', [], ['class' => 'btn btn-primary btn-sm mt-3']) !!}
            {!! link_to_route('top', 'トップページへ戻る', [], ['class' => 'btn btn-primary btn-sm mt-3']) !!}
        </div>
    </div>
@endsection
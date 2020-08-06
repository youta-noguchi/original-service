@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid">
           <div class="">
               <div class="mx-auto" style="max-width:1200px">
                   <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
                   <div class="">
                       <div class="d-flex flex-row flex-wrap">
                            
                            @if (count($items) > 0)
                                @foreach($items as $item)
                                    <div class="offset-md-1 col-md-5 mb-4">
                                        <img src="/images/{{$item->image}}" alt="" class="incart" width="200" height="200"><br>
                                        {!! link_to_route('itemlists.detail', $item->id, [$item->id]) !!}
                                        {{$item->item_name}}<br>
                                        ¥{{$item->price * 1.1 }}円（税込）<br>
                                    </div>
                                @endforeach
                            @endif
                            {{$items->links()}} 
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </div>
@endsection
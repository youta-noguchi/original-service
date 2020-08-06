<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;    // 追加

class CartsController extends Controller
{
    // カート画面の表示
    public function index()
    {
        // セッションからデータを取得する
        // $session = [
        //     'id' => [],
        // ];
        
        // session()->get('carts')　取得
        
        $carts = [];
        if (session()->has('carts')) {
            $cartsArray = session()->get('carts');
            foreach ($cartsArray as $cart) {
                $item = Item::findOrFail($cart['id']);
                $item['quantity'] = $cart['quantity'];
                $carts[] = $item;
            }
        }
        
        $sum = 0;
        foreach($carts as $cart){
            $sum += ($cart->price * 1.1 * $cart->quantity);
        }

        return view('carts.cart', [
            'carts' => $carts,
            'sum' => $sum,
        ]);
        
        
    }
    
    // セッション
    public function store(Request $request, $id)
    {
    //   $carts = [
    //         [
    //           'id' => 1,
    //           'number' => 1,
    //         ],
    //         [
    //           'id' => 2,
    //           'number' => 1,
    //         ],
    //         [
    //           'id' => 3,
    //           'number' => 1,
    //         ],
    //     ];
        
        Item::findOrFail($id);
        $itemData = [
            'id' => $id,
            'quantity' => $request->quantity,
        ];

        if (session()->has('carts')) {
            $carts = collect(session()->get('carts'));
            if ($carts->where('id', $id)->count() === 0) {
                session()->put('carts', $carts->add($itemData)->toArray());
                $message = '追加しました。';
            } else {
                $message = '既に追加済みです。';
            }
        } else {
            session()->put('carts', [$itemData]);
            $message = '追加しました。';
        }
        
        return back()->with([
            'message' => $message,
        ]);
    }
    
    // deleteでcart/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $carts = [];
        if (session()->has('carts')) {
            $cartsArray = session('carts');
            foreach ($cartsArray as $cart) {
                $item = Item::findOrFail($cart['id']);
                $item['quantity'] = $cart['quantity'];
                $carts[] = $item;
            }
        }
        
        // カートを削除
        session()->flush();
        // session()->forget('');

        // リダイレクト
        return back();
    }
}
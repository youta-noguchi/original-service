<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;    // 追加

class OrdersController extends Controller
{
    // オーダー画面の表示
    public function create()
    {
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            
   
            $data = [
                'user' => $user,
            ];
        }
        
        $carts = [];
        if (session()->has('carts')) {
            $cartsArray = session()->get('carts');
            foreach ($cartsArray as $cart) {
                $item = Item::findOrFail($cart['id']);
                $item['quantity'] = $cart['quantity'];
                $carts[] = $item;
            }
        }
        
        $data['carts'] = $carts;
        
        $sum = 0;
        foreach($carts as $cart){
            $sum += ($cart->price * 1.1 * $cart->quantity);
        }
        
        $data['sum'] = $sum;
        
        /*
         // セッションの値を取得 cartsっていうセッションの値を取得
        $carts = session()->get('carts');
        $data['carts'] = $carts;
        */
        
        // ビューでそれらを表示
        return view('buying.order', $data);
    }
}

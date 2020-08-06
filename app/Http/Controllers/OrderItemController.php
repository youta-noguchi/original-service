<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 中間テーブルを操作するクラス
class OrderItemController extends Controller
{
    /*
    // オーダーを保存する
    public function store()
    {
        
    }
    */
    
    
    public function store()
    {
        
        // カートを削除
        session()->flush();
        // session()->forget('');
        
        return view('buying.complete');
    }
    
}

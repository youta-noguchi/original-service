<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;    // 追加

class ItemlistsController extends Controller
{
    // トップページに商品一覧を表示
    public function top()
    {
        // 商品一覧を取得
        $items = Item::paginate(20);
        
        return view('welcome', [
            'items' => $items,
        ]);
    }
    
    // 商品詳細ページ getで/idにアクセスされた場合の「取得表示処理」
    public function detail($id)
    {
        // idの値で商品を検索して取得
        $item = Item::findOrFail($id);
        
        return view('itemlists.detail', [
            'item' => $item,
        ]);
    }
    
}

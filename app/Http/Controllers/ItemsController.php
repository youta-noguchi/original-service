<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;    // 追加

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 商品一覧を取得
        $items = Item::paginate(20);
        
        return view('items.index', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // getでitems/createにアクセスされた場合の「新規商品登録画面表示処理」
        $item = new Item;
        
        // 商品作成ビューを表示
        return view('items.create', [
            'item' => $item,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     // postでitems/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'item_name' => 'required',
            'price' => 'required',
        ]);
        
        // 商品を登録
        $item = new Item;
        $item->item_name = $request->item_name;
        $item->image = $request->image;
        $item->price = $request->price;
        $item->content = $request->content;
        $item->save();
        
        // 商品管理画面へリダイレクトさせる
        return redirect('items');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // getでitems/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        // idの値で商品を検索して取得
        $item = Item::findOrFail($id);
        
        // 商品詳細ビューでそれを表示
        return view('items.show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // getでitems/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        // idの値で商品を検索して取得
        $item = Item::findOrFail($id);
        
        // 商品編集ビューでそれを表示
        return view('items.edit', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // putまたはpatchでitems/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'item_name' => 'required',
            'price' => 'required',
        ]);
        
        // idの値で商品を検索して取得
        $item = Item::findOrFail($id);
        
        // 商品を更新
        $item->item_name = $request->item_name;
        $item->image = $request->image;
        $item->price = $request->price;
        $item->content = $request->content;
        $item->save();
        
        // 商品管理画面へリダイレクトさせる
        return redirect('items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // deleteでitems/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        // idの値で商品を検索して取得
        $item = Item::findOrFail($id);
        // 商品を削除
        $item->delete();

        // 商品管理ページへリダイレクトさせる
        return redirect('items');
    }
}

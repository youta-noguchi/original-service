<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'deliver_address',
    ];
    
    // このオーダーを所有するユーザ(Userモデルとの関係, 多対一)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // この注文で買う商品(Itemモデルとの関係を定義、(多対多))
    public function buying()
    {
        return $this->belongsToMany(Item::class, 'order_items', 'order_id', 'item_id')->withTimestamps();
    }
    
    // $itemIDで指定されたアイテムを保存
    // 中間テーブルのレコードを保存
    public function buy($itemId)
    {
        $this->buying()->attach($itemId);
            return true;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // この商品で買われる注文(Orderモデルとの関係を定義、(多対多))
    public function bought()
    {
        return $this->belongsToMany(Order::class, 'order_items', 'item_id', 'order_id')->withTimestamps();
    }
}

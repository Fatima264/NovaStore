<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model{
    public function user() { return $this->belongsTo(User::class, 'user_id'); }
    public function item() { return $this->belongsTo(Items::class, 'item_id'); }
    public function orders() { return $this->hasMany(Orders::class, 'cart_id'); }
}

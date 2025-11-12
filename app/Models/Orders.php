<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function user() { return $this->belongsTo(User::class, 'user_id'); }
    public function cart() { return $this->belongsTo(Carts::class, 'cart_id'); }
}

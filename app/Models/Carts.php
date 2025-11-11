<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model{
    public function user() { return $this->belongsTo(User::class, 'users_id'); }
    public function item() { return $this->belongsTo(Items::class, 'items_id'); }
    public function orders() { return $this->hasMany(Orders::class, 'carts_id'); }
}

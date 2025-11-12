<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    public function carts() { return $this->hasMany(Carts::class, 'item_id'); }
}

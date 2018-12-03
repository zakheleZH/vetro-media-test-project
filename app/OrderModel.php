<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = "order_models";
    public $primarykey = "id";
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

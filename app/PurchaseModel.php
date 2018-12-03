<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseModel extends Model
{
    protected $table = "purchase_models";
    public $primarykey = "id";
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}

?>
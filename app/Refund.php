<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
     public  function company() {
        return $this->belongsTo('App\Compnay', 'company_id');
    }
}

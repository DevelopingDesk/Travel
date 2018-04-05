<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
     public  function company() {
        return $this->belongsTo('App\Compnay', 'company_id');
    }
}

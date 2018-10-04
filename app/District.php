<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function broadcasters () {
        return $this->hasMany(Broadcaster::class,'district_id','id');
    }
}

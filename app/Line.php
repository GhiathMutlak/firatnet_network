<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    public function subscribers () {
        return $this->hasMany(Subscriber::class,'line_id','id');
    }
}

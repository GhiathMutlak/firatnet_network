<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    public function line () {
        return $this->belongsTo( Line::class );
    }

    public function broadcaster () {
        return $this->belongsTo( Broadcaster::class );
    }
}

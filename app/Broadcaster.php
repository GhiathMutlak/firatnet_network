<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property array|string district_id
 * @property array|string name
 */
class Broadcaster extends Model
{
    public function subscribers () {
        return $this->hasMany(Subscriber::class, 'broadcaster_id','id');
    }

    public function district () {
        return $this->belongsTo( District::class );
    }
}

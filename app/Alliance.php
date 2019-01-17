<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alliance extends Model
{
    //
    public function league()
    {
        return $this->belongsTo('App\League');
    }
    public function owner()
    {
        return $this->belongsTo('App\User');
    }
}

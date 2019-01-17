<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class League extends Model
{
    //
    public function invitations()
    {
        return $this->hasMany('App\Invitation');
    }
    public function alliances()
    {
        return $this->hasMany('App\Alliance');
    }
}

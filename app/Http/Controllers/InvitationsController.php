<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invitation;
use App\League;
use App\User;

class InvitationsController extends Controller
{
    //
    public function store(League $league){
        $invitation = new Invitation();
        
        $invitation->league_id = $league->id;
        $invitation->invitation_email = request('email');
        $invitation->position = request('position');
        $invitation->save();
        
        return redirect('/league/' . $league->id . '/edit');
    }
    public function update(League $league){
        $invitation = $league->invitations->where('position', request('position'))->first();
        $invitation->invitation_email = request('email');
        $invitation->save();
        
        return redirect('/league/' . $league->id . '/edit');
    }
}

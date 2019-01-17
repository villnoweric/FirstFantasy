<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\League;
use App\Alliance;
use App\Invitation;

class AlliancesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
    }
    
    public function show(){
        
    }
    
    public function store(League $league){
        $alliance = new Alliance();
        $invitation = Invitation::where('league_id', $league->id)->where('invitation_email', Auth::user()->email)->get()->first();
        $alliance->league_id = $league->id;
        $alliance->user_id = Auth::user()->id;
        $alliance->name = request('name');
        $alliance->position = $invitation->position;
        
        $invitation->delete();
        $alliance->save();
        
        return redirect('/league/' . $league->id);
    }
    //
    public function create(League $league){
        return view('alliance.create', compact('league'));
    }
}

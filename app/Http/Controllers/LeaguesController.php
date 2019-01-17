<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\League;
use App\User;
use App\Invitation;
use App\Alliance;

class LeaguesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //
    public function index(){
        $alliances = Auth::user()->alliances;
        $invitations = Invitation::where('invitation_email', '=',Auth::user()->email)->get();
        return view('league.index', compact(['alliances','invitations']));
    }
    
    public function create(){
        return view('league.create');
    }
    
    public function store(){
        $league = new League();
        
        $league->name = request('name');
        $league->size = request('size');
        $league->manager = Auth::id();
        
        $league->save();
        
        $invitation = new Invitation();
        
        $invitation->league_id = $league->id;
        $invitation->invitation_email = Auth::user()->email;
        $invitation->position = 1;
        $invitation->save();
        
        return redirect('/league/' . $league->id . '/edit');
    }
    
    public function show(League $league){
        return view('league.league', compact('league'));
    }
    
    public function edit(League $league){
        $manager =  User::find($league->manager);
        $invitations = Invitation::where('league_id', $league->id)->get();
        return view('league.manage', compact(['league','manager','invitations']));
    }
    
    public function update(League $league){
        $league->name = request('name');
        $league->size = request('size');
        
        $league->save();
        
        return redirect('/league/' . $league->id . '/edit');
    }
}

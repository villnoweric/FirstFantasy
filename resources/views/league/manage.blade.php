@extends('layouts.fantasy')

@section('head')
    <style>
        body {
          padding-top: 4.5rem;
        }
    </style>
@endsection

@section('content')
<main role="main" class="container">
    <div class="starter-template">
    <h1>Manage League</h1>
    
    <form method="POST" action="{{ url('/league/' . $league->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">League Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $league->name }}">
        </div>
        <div class="form-group">
            <label for="size">League Size</label>
            <select class="form-control" id="size" name="size">
                <option>4</option>
                <option>6</option>
                <option>8</option>
                <option>10</option>
                <option>12</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button> <button class="btn btn-danger">Delete League</button>
    </form><br>
    <h2>League Members</h2>
        <div class="form-group">
            <label for="name">League Manager Email</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $manager->email }}"  readonly>
        </div>
        @for($i = 2; $i<=$league->size; $i++)
        @if($invitations->where('position', $i)->isEmpty())
            @if($league->alliances->where('position', $i)->isEmpty())
            <form method="POST" action="{{ url('/league/' . $league->id . '/invite') }}">
                @csrf
                <div class="form-row">
    
                    <div class="col-md-10">
                    <div class="form-group">
                        <label for="name">Alliance {{ $i }}'s Email</label>
                        <input type="hidden" name="position" value="{{ $i }}">
                        <input type="text" class="form-control" id="name" name="email">
                    </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="button">&nbsp;</label>
                            <button type="submit" id="button" class="btn btn-success form-control">Invite</button>
                        </div>
                        
                    </div>
                </div>
            </form>
            @else
            <form method="POST" action="{{ url('/league/' . $league->id . '/') }}">
                @csrf
                <div class="form-row">
    
                    <div class="col-md-10">
                    <div class="form-group">
                        <label for="name">Alliance {{ $i }}</label>
                        <input type="hidden" name="position" value="{{ $i }}">
                        <input type="text" class="form-control" id="name" name="email" readonly value="{{ $league->alliances->where('position', $i)->first()->name }}">
                    </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="button">&nbsp;</label>
                            <!--<button type="submit" id="button" class="btn btn-danger form-control">Kick</button>-->
                        </div>
                        
                    </div>
                </div>
            </form>
            @endif
        @else
        <form method="POST" action="{{ url('/league/' . $league->id . '/invite') }}">
            @csrf
            @method('PATCH')
            <div class="form-row">
                <div class="col-md-10">
                <div class="form-group">
                    <label for="name">Alliance {{ $i }}'s Email</label>
                    <input type="hidden" name="position" value="{{ $i }}">
                    <input type="text" class="form-control" id="name" name="email" value="{{ $invitations->where('position', $i)->first()->invitation_email }}">
                </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="button">&nbsp;</label>
                        <button type="submit" id="button" class="btn btn-warning form-control">Update</button>
                    </div>
                    
                </div>
            </div>
        </form>
        @endif
        @endfor

  
  </div>

</main><!-- /.container -->
@endsection
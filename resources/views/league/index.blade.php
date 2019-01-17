@extends('layouts.fantasy')

@section('content')

<main role="main">
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Leagues</h1>
      <p></p>
      <p><a class="btn btn-primary btn-lg" href="{{ url('/league/create') }}" role="button">Create League &raquo;</a></p>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <h1 class="title">My Alliances</h1><hr>
    <div class="row">
        @foreach($alliances as $alliance)
      <div class="col-md-4">
        <h2>{{ $alliance->name }}</h2>
        <p>{{ $alliance->league->name }}</p>
        <p><a class="btn btn-secondary" href="{{ url('/league/' . $alliance->league->id) }}" role="button">View League &raquo;</a></p>
      </div>
      @endforeach
    </div>
    <hr>
    <h2>League Invitations</h2>
    <div class="row">
        @foreach($invitations as $invitation)
      <div class="col-md-4">
        <h2>{{ $invitation->league->name }}</h2>
        <p>You've been invited to join this league. Click below to create your alliance!</p>
        <p><a class="btn btn-danger" href="{{ url('/league/' . $invitation->league->id . '/alliance') }}" role="button">Join League &raquo;</a></p>
      </div>
      @endforeach
    </div>

    <hr>

  </div> <!-- /container -->

</main>

<footer class="container">
  <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}</p>
</footer>

@endsection

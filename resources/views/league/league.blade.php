@extends('layouts.app')

@section('content')
<main role="main">
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">{{ $league->name }}</h1>
      @if($league->manager == Auth::id())
      <p></p>
      <p><a class="btn btn-warning btn-lg" href="{{ url('/league/' . $league->id . '/edit') }}" role="button">Manage League &raquo;</a></p>
      @endif
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <h1 class="title">Alliances</h1><hr>
    <div class="row">
    @foreach($league->alliances as $alliance)
      {{ $alliance->name }}<br>
    @endforeach
    </div>
    <hr>
  </div> <!-- /container -->

</main>

<footer class="container">
  <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}</p>
</footer>
@endsection
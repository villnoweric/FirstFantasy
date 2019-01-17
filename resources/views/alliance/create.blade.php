@extends('layouts.fantasy')


@section('content')
<main role="main">
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">{{ $league->name }}</h1>
    </div>
  </div>
    <div class="container">
        <h1>Create Alliance</h1>
        
        <form method="POST" action="{{ url('/league/' . $league->id . '/alliance') }}">
            @csrf
            <div class="form-group">
                <label for="name">Alliance Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <button type="submit" class="btn btn-primary">Continue</button>
        </form>
      <hr>
    </div>

</main><!-- /.container -->

<footer class="container">
  <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}</p>
</footer>
@endsection
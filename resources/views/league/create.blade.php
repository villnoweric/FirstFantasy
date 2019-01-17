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
    <h1>Create League</h1>
    
    <form method="POST" action="{{ url('/league') }}">
        @csrf
        <div class="form-group">
            <label for="name">League Name</label>
            <input type="text" class="form-control" id="name" name="name">
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
        <button type="submit" class="btn btn-primary">Continue</button>
    </form>
    <hr>
  </div>

</main><!-- /.container -->
<footer class="container">
  <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}</p>
</footer>
@endsection
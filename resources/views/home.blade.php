@extends('layouts.app')

@section('head')
<style>
    html,
    body{
        background:black;
        height:100%;
    }
    #app{
        height:calc(100% - 55px);
    }
    .full-height{
        height:100%;
    }
    .jumbotron{
        margin-bottom:0;
        border-radius:0;
    }
    .banner{
        background:url({{ asset('img/cover.jpg') }}) center no-repeat;
        background-size:100% auto;
    }
    @media only screen and (max-width : 768px) {
        .banner{
            background:url({{ asset('img/icon.jpg') }}) center no-repeat;
            background-size:100% auto;
        }
    }
</style>
@endsection

@section('content')
<div class="d-flex full-height flex-column">
    <div class="d-flex justify-content-center flex-grow-1 banner">
    </div>
    <div class="jumbotron d-flex">
      <div class="container">
        <h1>First Fantasy</h1>
        <p>Welcome to First Fantasy, the unofficial FRC Fantasy Platform. We are currently under development, and are looking at being ready Feberuary 2019</p>
        <!--<p><a class="btn btn-primary btn-lg" href="register" role="button">Create Your League!</a></p>-->
      </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>
@endsection

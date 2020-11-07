@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
  <h1>Beranda</h1>
  <h6 class="text-secondary">Selamat Datang {{ Auth::user()->name }}</h6>
@stop
@section('content')
<section id="banner">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://cdn.pixabay.com/photo/2015/01/08/18/25/startup-593327_1280.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://cdn.pixabay.com/photo/2015/01/08/18/25/startup-593327_1280.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://cdn.pixabay.com/photo/2015/01/08/18/25/startup-593327_1280.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>
@stop
@section('css')
  <style>
    #banner{
      height: 200px !important;
    }
  </style>
@stop
@section('js')
    <script>

    </script>
@stop
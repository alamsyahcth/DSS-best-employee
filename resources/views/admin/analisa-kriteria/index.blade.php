@extends('adminlte::page')
@section('title','Analisa Kriteria')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@section('content_header')
  <h1>Analisa Kriteria</h1>
  <h6 class="text-secondary">Analisa Kriteria Untuk Bobot Kriteria</h6>
  <a href="{{ url('admin/analisa-kriteria/hasil/A-2020-11-28903') }}" class="btn btn-md btn-primary">Lihat Hasil</a>
@stop
@section('content')
<section class="mb-5">
  @include('admin/alert')
  <div class="card">
    <form class="form-horizontal" method="post" action="{{ url('admin/analisa-kriteria/check') }}">
      @csrf
      <div class="card-body">
        <div class="row py-1">
          <div class="col-md-3 text-center border-right">
            <h5 class="text-primary">Kriteria Pertama</h5>
          </div>
          <div class="col-md-6 text-center">
            <h5 class="text-primary">Penilaian</h5>
          </div>
          <div class="col-md-3 text-center border-left">
            <h5 class="text-primary">Kriteria Kedua</h5>
          </div>
        </div>
        <hr>
        <div class="form">
          <?php  $flag = $count_kriteria; ?>
          @foreach($kriteria as $k)
          <div class="row">
            <div class="col-md-3 d-flex align-items-center justify-content-center text-center border-right">
              <h4>{{ $k->name }}</h4>
              <input type="hidden" name="k1[]" class="form-control" value="{{ $k->id }}">
            </div>
            <div class="col-md-6">
              @for($i=0; $i<$count_kriteria; $i++)
                <select class="form-control" name="n-{{$i}}[]">
                  @foreach($nilai as $n)
                    <option value="{{ $n->grade_total }}">{{$n->grade_total}} - {{ $n->definition}}</option>
                  @endforeach
                </select><br>
              @endfor
            </div>
            {{-- <div class="col-md-3 border-left">
              @foreach($kriteria2 as $k2)
                @if($k2->id >= $k->id)
                  <input type="hidden" name="k2-{{$l++}}[]" class="form-control" value="{{ $k2->id }}">
                  <p class="font-weight-bold">{{ $k2->name }}</p><br>
                @endif
              @endforeach
            </div> --}}
            <div class="col-md-3 border-left">
              @foreach($kriteria2 as $k2)
                <input type="hidden" name="k2[]" class="form-control" value="{{ $k2->id }}">
                <p class="font-weight-bold">{{ $k2->name }}</p><br>
              @endforeach
            </div>
          </div>
          <hr>
          <?php $flag = $flag-1; ?>
          @endforeach
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="submit" class="btn btn-md btn-primary btn-block"><i class="fas fa-calculator"></i> Hitung Analisa Kriteria</button>
      </div>
    </form>
  </div>
</section>
@stop

@section('css')
  @include('admin/all-css')
@stop
@section('js')
  @include('admin/all-js')
  <script>
    
  </script>
@stop
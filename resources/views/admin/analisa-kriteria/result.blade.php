@extends('adminlte::page')
@section('title','Hasil Analisa Kriteria')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@section('content_header')
  <h1>Hasil Analisa Kriteria</h1>
  <h6 class="text-secondary">Hasil Analisa Kriteria Untuk Bobot Kriteria</h6>
@stop
@section('content')
<section class="mb-5">
  @include('admin/alert')
  <div class="card">
   <div class="card-body">
    <table class="table table-bordered table-hover">
      <tr>
        <td class="text-right text-secondary bg-secondary font-weight-bold">Antar Kriteria</td>
        @foreach($kriteria as $k)
          <td class="text-center font-weight-bold">{{$k->name}}</td>
        @endforeach
      </tr>
      @foreach($kriteria2 as $k2)
        <tr>
          <td class="text-right font-weight-bold">{{$k2->name}}</td>
          @foreach($nilai_analisa_kriteria as $n)
            @if($k2->id == $n->id_kriteria_1)
              <td class="text-center">{{$n->nilai_analisa_kriteria}}</td>
            @endif
          @endforeach
        </tr>
      @endforeach
      <tr class="bg-warning">
        <td class="text-right font-weight-bold">Jumlah</td>
        @foreach($sum as $data_sum)
          <td class="text-center font-weight-bold">{{ $data_sum }}</td>
        @endforeach
      </tr>
    </table>
   </div>
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
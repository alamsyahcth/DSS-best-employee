@extends('adminlte::page')
@section('title','Hasil Perhitungan')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@section('content_header')
  <h1>Hasil Perhitungan</h1>
  <h6 class="text-secondary">Hasil Akhir Untuk Menentukan Peringkat</h6>
@stop
@section('content')
<section class="mb-5">
  @include('admin/alert')
  <div class="card">
    <div class="card-header">
      <h6 class="mb-0 font-weight-bold">Nilai Alternatif</h6>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <tr>
          <td class="text-center font-weight-bold">Nama Karyawan</td>
          <td class="text-center font-weight-bold">Nilai Akhir</td>
          <td class="text-center font-weight-bold">Ranking</td>
          <td class="text-center font-weight-bold">Keputusan</td>
        </tr>
        @php 
          $i=1;
        @endphp
        @foreach($grade as $g)
          <tr>
            <td class="text-center">{{ $g->name }}</td>
            <td class="text-center">{{ number_format((float)$g->total_sum, 3, '.', '') }}</td>
            <td class="text-center">{{ $i++ }}</td>
            <td class="text-center">
              @if($g->total_sum > 60)
                Lulus
              @elseif($g->total_sum <=60)
                Tidak Lulus
              @endif
            </td>
          </tr>
        @endforeach
      </table>
    </div>
    <div class="card-footer">
      <form class="form-horizontal" method="post" action="">
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
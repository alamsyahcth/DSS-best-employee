@extends('adminlte::page')
@section('title','Analisa Kriteria')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@section('content_header')
  <h1>Laporan Hasil Keputusan</h1>
  <h6 class="text-secondary">Cetak Laporan Hasil Keputusan</h6>
@stop
@section('content')
<section class="mb-5">
  @include('admin/alert')
  <div class="card">
    <div class="card-body">
      <form class="form-horizontal" action="{{ url('admin/laporan/cetak') }}" method="post">
        @csrf
        <div class="form">
          <div class="form-group row">
            <div class="col-md-12">
              <input type="hidden" name="id_laporan" value="1">
              <label for="date" class="control-label">Tanggal / Kode</label>
              <select class="form-control" name="alternative_code">
                @foreach($data as $d)
                <option value="{{ $d->alternative_code }}">{{ $d->date }} - {{ $d->alternative_code }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-12 mt-2">
              <button type="submit" class="btn btn-primary btn-md btn-block"><i class="fas fa-print"></i> Cetak</button>
            </div>
          </div>
        </div>
      </form>
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
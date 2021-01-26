@extends('adminlte::page')
@section('title','Analisa Kriteria')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@section('content_header')
  <h1>Hasil Perhitungan</h1>
  <h6 class="text-secondary">Hasil Perhitungan Alternatif</h6>
@stop
@section('content')
<section class="mb-5">
  @include('admin/alert')
  <div class="card">
    <div class="card-body">
      <form class="form-horizontal" action="{{ url('admin/hasil-result') }}" method="post">
        @csrf
        <div class="form">
          <div class="form-group row">
            <div class="col-md-12">
              <label for="alternative_code" class="control-label">Kode Alternatif</label>
              <select class="form-control" name="alternative_code">
                @foreach($data as $d)
                <option value="{{ $d->alternative_code }}">{{ $d->alternative_code }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-12 mt-3">
              <button type="submit" class="btn btn-primary btn-md btn-block"><i class="fas fa-search"></i> Tampilkan</button>
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
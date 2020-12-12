@extends('adminlte::page')
@section('title','Analisa Kriteria')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@section('content_header')
  <h1>Analisa Alternatif</h1>
  <h6 class="text-secondary">Analisa Alternatif Untuk Menentukan Nilai</h6>
  {{-- <a href="{{ url('admin/analisa-alternatif/hasil/ALT-2020-12-09799') }}" class="btn btn-md btn-primary">Lihat Hasil</a> --}}
@stop
@section('content')
<section class="mb-5">
  @include('admin/alert')
  <div class="card">
    <form class="form-horizontal" method="post" action="{{ url('admin/analisa-alternatif/check') }}">
      @csrf
      <div class="card-body">
        <div class="row py-1">
          <div class="col-md-3 text-center border-right">
            <h5 class="text-primary">Nama Karyawan</h5>
          </div>
          <div class="col-md-3 text-center border-right">
            <h5 class="text-primary">Penilaian</h5>
          </div>
          <div class="col-md-3 text-center">
            <h5 class="text-primary">Bobot Kriteria</h5>
          </div>
          <div class="col-md-3 text-center border-left">
            <h5 class="text-primary">Nilai</h5>
          </div>
        </div>
        <hr>
        <div class="form">
          @php $flag=1; @endphp
          @foreach($karyawan as $k)
          <div class="row">
            <div class="col-md-3 d-flex align-items-center justify-content-center text-center border-right">
              <h4>{{ $k->name }}</h4>
              <input type="hidden" name="k[]" class="form-control" value="{{ $k->id }}">
            </div>
            <div class="col-md-3 border-right pl-4">
              @foreach($kriteria as $kriterias)
                <h6 class="mb-4 mt-1">{{ $kriterias->name }}</h6>
                <input type="hidden" name="kriteria[]" class="form-control" value="{{ $kriterias->id }}">
              @endforeach
            </div>
            <div class="col-md-3 text-center">
              @foreach($kriteria as $kriterias)
                <h6 class="mb-4 mt-1">{{ number_format((float)$kriterias->weight_criteria, 3, '.', '') }}</h6>
                <input type="hidden" name="bobot[]" class="form-control" value="{{ $kriterias->weight_criteria }}">
              @endforeach
            </div>
            <div class="col-md-3 border-left">
              @php $i=1; @endphp
              @foreach($kriteria as $kriterias)
                <input type="number" name="grades[]" class="form-control mb-1" value="" placeholder="{{ $kriterias->name }}" step="any" min="0.000" max="100.999" required>
              @endforeach
            </div>
          </div>
          <hr>
          @php $flag++; @endphp
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
  <style>
    ::-webkit-input-placeholder {
      color: rgb(247, 247, 247);
    }
    :-ms-input-placeholder {
      color: rgb(247, 247, 247);
    }
    ::placeholder {
      color: rgb(247, 247, 247);
    }
  </style>
@stop
@section('js')
  @include('admin/all-js')
  <script>
    
  </script>
@stop
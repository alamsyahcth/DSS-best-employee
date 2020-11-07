@extends('adminlte::page')
@section('title','Analisa Kriteria')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@section('content_header')
  <h1>Analisa Kriteria</h1>
  <h6 class="text-secondary">Analisa Kriteria Untuk Bobot Kriteria</h6>
@stop
@section('content')
<section>
  @include('admin/alert')
  <div class="card">
    <div class="card-body">
      {{-- <table border="1">
        @foreach($kriteria as $k)
          <tr>
            <td rowspan="{{ $count_kriteria+1 }}">{{ $k->name }}</td>
          </tr>
          @for($i=0; $i<$count_kriteria; $i++)
          <tr>
            <td>
              <select name="nilai{{$k->name}}-{{$i}}" class="form-control">
                @foreach($nilai as $n)
                  <option value="{{ $n->grade_total }}">{{$n->grade_total}} - {{ $n->definition}}</option>
                @endforeach
              </select><br>
            </td>
          </tr>
          @endfor
          @foreach($kriteria2 as $k2)
            <tr>
              <td>{{ $k2->name }}<br></td>
            </tr>
          @endforeach
        @endforeach
      </table> --}}
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
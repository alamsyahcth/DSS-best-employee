@extends('adminlte::page')
@section('title','Nilai')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@section('content_header')
  <h1>Data Kriteria</h1>
  <h6 class="text-secondary">Masukkan Data Kriteria</h6>
@stop
@section('content')
<section>
  @include('admin/kriteria/create')
  @include('admin/kriteria/edit')
  @include('admin/alert')
  <div class="card">
    <div class="card-header">
      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#create-modal"><i class="fas fa-plus-square"></i> Create New</button>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped" id="table">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="10%">Kode</th>
            <th width="50%">Nama Kriteria</th>
            <th width="20%">Bobot</th>
            <th width="15%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          @foreach($data as $d)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $d->criteria_code }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->weight_criteria }}</td>
            <td>
              <button class="btn btn-primary btn-sm" id="edit-data" data-toggle="modal" data-target="#edit-modal"
                data-id="{{ $d->id }}" 
                data-grade="{{ $d->criteria_code }}"
                data-name="{{ $d->name }}"><i class="fas fa-edit"></i></button>
              <a href="{{ url('admin/kriteria/delete/'.$d->id) }}" onclick="return confirm('Anda yakin menghapus data ini?')" class="btn btn-danger btn-sm text-light" id="edit-data" ><i class="fas fa-trash"></i></button>
            </td>
          </tr>
          @endforeach
        </tbody>
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
    $(document).on('click','#edit-data', function() {
      var id = $(this).data("id");
      var name = $(this).data("name");
      $("#edit-modal #id").val(id);
      $("#edit-modal #name").val(name);
    })
  </script>
@stop
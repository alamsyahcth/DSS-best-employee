@extends('adminlte::page')
@section('title','Karyawan')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@section('content_header')
  <h1>Data Nilai</h1>
  <h6 class="text-secondary">Masukkan Data Nilai</h6>
@stop
@section('content')
<section>
  @include('admin/karyawan/create')
  @include('admin/karyawan/edit')
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
            <th width="50%">Name</th>
            <th width="10%">Gender</th>
            <th width="20%">Position</th>
            <th width="15%">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $i=1; @endphp
          @foreach($data as $d)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->gender }}</td>
            <td>{{ $d->position }}</td>
            <td>
              <button class="btn btn-primary btn-sm" id="edit-data" data-toggle="modal" data-target="#edit-modal"
                data-id="{{ $d->id }}" 
                data-name="{{ $d->name }}"
                data-gender="{{ $d->gender }}"
                data-position="{{ $d->position }}"><i class="fas fa-edit"></i></button>
              <a href="{{ url('admin/karyawan/delete/'.$d->id) }}" onclick="return confirm('Anda yakin menghapus data ini?')" class="btn btn-danger btn-sm text-light" id="edit-data" ><i class="fas fa-trash"></i></button>
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
      var gender = $(this).data("gender");
      var position = $(this).data("position");
      $("#edit-modal #id").val(id);
      $("#edit-modal #name").val(name);
      $("#edit-modal #gender").val(gender);
      $("#edit-modal #position").val(position);
    })
  </script>
@stop
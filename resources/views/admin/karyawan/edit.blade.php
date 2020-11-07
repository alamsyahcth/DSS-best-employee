<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" method="post" action="{{ url('admin/karyawan/update') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form">
            <div class="form-group">
              <input type="hidden" name="id" id="id">
              <label for="name" class="control-label">Name</label>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" autocomplete="name"/>
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="gender" class="control-label">Gender</label>
              <select name="gender" id="gender" class="form-control">
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
              </select> 
              @error('gender')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="position" class="control-label">Position</label>
              <input type="text" name="position" id="position" class="form-control @error('position') is-invalid @enderror" autocomplete="position"/>
              @error('position')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary">Cancel</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
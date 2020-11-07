<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form-horizontal" method="post" action="{{ url('admin/nilai/create') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form">
            <div class="form-group">
              <label for="grade_total" class="control-label">Grade Total</label>
              <input type="number" name="grade_total" class="form-control @error('grade_total') is-invalid @enderror" autocomplete="grade_total"/>
              @error('grade_total')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="description" class="control-label">Description</label>
              <textarea type="textarea" name="description" class="form-control @error('description') is-invalid @enderror" autocomplete="description"></textarea>
              @error('description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="definition" class="control-label">Definition</label>
              <input type="text" name="definition" class="form-control @error('definition') is-invalid @enderror" autocomplete="definition"/>
              @error('definition')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary">Cancel</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- ADD ITEM MODAL -->
<div class="modal fade" id="addModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="addData" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-gradient-primary">
          <h5 class="modal-title" id="addData">Create Data</h5>
        </div>
        <div class="modal-body">
          <form id="addForm">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="col-form-label">Name:</label>
                <input type="text" id="name" class="form-control" name="name">
                <small class="error_name text-danger hidden"></small>
            </div>
            <div class="form-group">
                <label for="email" class="col-form-label">Email:</label>
                <input type="text" id="email" class="form-control" name="email">
                <small class="error_email text-danger hidden"></small>
            </div>
            <div class="form-group">
                <label for="password" class="col-form-label">Password:</label>
                <input type="password" id="password" class="form-control" name="password">
                <small class="error_password text-danger hidden"></small>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="col-form-label">Retype Password:</label>
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
                <small class="error_password_confirmation text-danger hidden"></small>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="storeBtn" class="btn btn-primary" >Store</button>
            </form>
        </div>
      </div>
    </div>
</div>

<!-- EDIT ITEM MODAL -->
<div class="modal fade" id="editModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="editData" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-gradient-info">
          <h5 class="modal-title" id="editData">Edit Data</h5>
        </div>
        <div class="modal-body">
          <form id="editForm">
            {{ csrf_field() }}
            <input type="hidden" id="edit_id" name="id">
            <div class="form-group">
                <label for="name" class="col-form-label">Name:</label>
                <input type="text" id="edit_name" class="form-control" name="name">
                <small class="edit_error_name text-danger hidden"></small>
            </div>
            <div class="form-group">
                <label for="email" class="col-form-label">Email:</label>
                <input type="text" id="edit_email" class="form-control" name="email">
                <small class="edit_error_email text-danger hidden"></small>
            </div>
            <div class="form-group">
                <label for="password" class="col-form-label">Password:</label>
                <input type="password" id="edit_password" class="form-control" name="password">
                <small class="text-danger">*Biarkan jika tidak ingin mengganti password</small> <br>
                <small class="edit_error_password text-danger hidden"></small>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="col-form-label">Retype Password:</label>
                <input type="password" id="edit_password_confirmation" class="form-control" name="password_confirmation">
                <small class="edit_error_password_confirmation text-danger hidden"></small>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="updateBtn" class="btn btn-info" >Update</button>
            </form>
        </div>
      </div>
    </div>
</div>
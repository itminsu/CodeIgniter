<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Update customer</h3>
      </div>
      <div class="modal-body form">
        <form id="form_update" action="#" class="form-horizontal">
          <input type="hidden" name="customer_id" id="modal_customer_id">
          <div class="form-body">
            <div class="form-group">
              <label class="col-md-3">Last Name</label>
                <div class="col-md-9">
                  <input type="text" name="last_name" class="form-control" id ="modal_last_name" required="required">
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-3">First Name</label>
                <div class="col-md-9">
                  <input type="text" name="first_name" class="form-control" id ="modal_first_name" required="required">
                </div>
            </div>
            <div class="form-group">
              <label class="col-md-3">Active</label>
                <div class="col-md-9">
                  <select class="form-control" name="active" id ="modal_active">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>
            </div>
          </div>
        </form>
        <div class="modal-footer">
          <button class="btn btn-primary" id="btnSave" type="button" onclick="save()">Save</button>
          <button class="btn btn-danger" data-dismiss="modal" type="button">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>

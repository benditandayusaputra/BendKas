<div class="card shadow mb-4">
  <div class="card-body">
  	<div class="row">
  		<div class="col-12 col-lg-6 col-md-6">
  			<button type="button" class="btn btn-primary my-3" id="btn-add">
  				<i class="fa fa-plus"></i> Tambah
  			</button>
  		</div>
  		<div class="col-12 col-lg-6 col-md-6 text-right d-none" id="action">
  			<button type="button" class="btn btn-success my-3" id="btn-edit">
  				<i class="fa fa-edit"></i> Edit
  			</button>
  			<button type="button" class="btn btn-danger my-3" id="btn-delete">
  				<i class="fa fa-trash"></i> Hapus
  			</button>
  			<button type="button" class="btn btn-secondary my-3" id="btn-cancel">
  				<i class="fa fa-undo"></i> Batal
  			</button>
  		</div>
  	</div>
    <div class="table-responsive">
    	<table class="table table-bordered table-hover" id="schedule-table">
    	  <caption>Data Users</caption>
    	  <thead>
    	    <tr>
    	      <th scope="col">No</th>
    	      <th scope="col">Hari</th>
    	      <th scope="col">Jumlah</th>
    	    </tr>
    	  </thead>
    	  <tbody>

    	  </tbody>
    	</table>
    </div>
  </div>
</div>

<div class="modal fade" id="schedule-modal" tabindex="-1" role="dialog" aria-labelledby="schedule-modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="schedule-modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-schedule">
          <input type="hidden" name="id" id="id" value="">
          <div class="form-group">
            <select class="custom-select" name="day" id="day">

            </select>
          </div>
          <div class="form-group">
            <label for="amount">Jumlah Kas</label>
            <input type="number" class="form-control" name="amount" id="amount" placeholder="Masukan Jumlah Kas">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">
        	<i class="fa fa-times"></i> Batal
        </button>
        <button type="button" class="btn btn-primary" id="btn-save">
        	<i class="fa fa-save"></i> Simpan
        </button>
      </div>
    </div>
  </div>
</div>
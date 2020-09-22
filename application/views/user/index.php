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
    	<table class="table table-bordered table-hover" id="user-table">
    	  <caption>Data Users</caption>
    	  <thead>
    	    <tr>
    	      <th scope="col">Absen</th>
    	      <th scope="col">NIS</th>
    	      <th scope="col">Nama</th>
    	      <th scope="col">Jenis Kelamin</th>
    	      <th scope="col">Password</th>
    	    </tr>
    	  </thead>
    	  <tbody>

    	  </tbody>
    	</table>
    </div>
  </div>
</div>

<div class="modal fade" id="user-modal" tabindex="-1" role="dialog" aria-labelledby="user-modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="user-modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-user">
          <input type="hidden" name="id" id="id" value="">
          <div class="form-group">
            <label for="no">Absen</label>
            <input type="number" class="form-control" name="no" id="no" placeholder="Masukan No Absen">
          </div>
          <div class="form-group">
            <label for="nis">NIS</label>
            <input type="number" class="form-control" name="nis" id="nis" placeholder="Masukan NIS">
          </div>
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nama Lengkap">
          </div>
          <div class="form-group">
            <select class="custom-select" name="gender" id="gender">
              <option value="">-- Pilih Jenis Kelamin --</option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <select class="custom-select" name="user_type" id="user_type">
              <option value="">-- Pilih Tipe User --</option>
              <option value="SISWA">SISWA</option>
              <option value="GURU">GURU</option>
            </select>
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
<form method="POST" action="<?= site_url('user/sb_input') ?>">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form</h4>
        <br>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="name" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="username" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="password" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">NIK</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" name="nik" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">No. Telp</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" name="telp" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-8">
            <select class="form-control" name="gender" required>
              <option value="">(Pilih)</option>
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Role</label>
          <div class="col-sm-8">
            <select class="form-control" name="role" required>
              <option value="">(Pilih)</option>
              <?php foreach ($role as $key => $value) { ?>
                <option value="<?= $value ?>"><?= $value ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
        <button class="btn btn-light" onclick="window.history.go(-1);">Cancel</button>
      </div>
    </div>
  </div>
</form>
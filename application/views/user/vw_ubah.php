<form method="POST" action="<?= site_url('user/sb_ubah') ?>">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form</h4>
        <br>
        
        <input type="hidden" name="usr_id" value="<?= $usr['usr_id'] ?>">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="name" required value="<?= $usr['name'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="username" required value="<?= $usr['username'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="password">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">NIK</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" name="nik" required value="<?= $usr['nik'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">No. Telp</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" name="telp" required value="<?= $usr['phone'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-8">
            <select class="form-control" name="gender" required>
              <option value="">(Pilih)</option>
              <option <?= $usr['gender'] == "L" ? "selected" : "" ?> value="L">Laki-Laki</option>
              <option <?= $usr['gender'] == "P" ? "selected" : "" ?> value="P">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Role</label>
          <div class="col-sm-8">
            <select class="form-control" name="role" required>
              <option value="">(Pilih)</option>
              <?php foreach ($role as $key => $value) { ?>
                <option <?= $value == $usr['role'] ? "selected" : "" ?> value="<?= $value ?>"><?= $value ?></option>
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
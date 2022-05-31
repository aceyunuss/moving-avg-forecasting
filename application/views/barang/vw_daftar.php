<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Barang</h4>
    <hr>
    <div class="table-responsive">
      <table class="table" id="usrtbl">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Ukuran</th>
            <th class="text-center">Jumlah</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($itm as $key => $value) { ?>
            <tr>
              <td class="text-center"><?= ++$key ?></td>
              <td><?= $value['name'] ?></td>
              <td><?= $value['size'] ?></td>
              <td><?= $value['total'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
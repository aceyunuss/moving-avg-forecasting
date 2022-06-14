<form method="POST" action="<?= site_url('penjualan/sb_input') ?>">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label>Nama Barang</label>
              <select id="item" class="form-control">
                <?php foreach ((array)$item as $k => $v) { ?>
                  <option value="<?= $v ?>"><?= $v ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Ukuran</label>
              <select id="size" class="form-control">
                <option value="all">Semua ukuran</option>
                <?php foreach ((array)$uom as $k => $v) { ?>
                  <option value="<?= $v['uom_id'] ?>"><?= $v['uom_val'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>N Periode</label>
              <select class="form-control " name="np" id="member">
                <option value="all">Semua bulan</option>
                <?php foreach ((array)$mth as $k => $v) { ?>
                  <option value="<?= $k ?>"><?= $v ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <p></p>

            <div class="form-group">
              <a href="#" class="btn btn-sm btn-success">Hitung</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>



<script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();


    $('.add').click(function(e) {

      e.preventDefault(e);
      let rw = $('.itm tr').length


      tbody = '<tr data-row="' + rw + '">\
                <td>\
                  <center>\
                    <i class="remove fa fa-trash-o"></i>\
                  <center>\
                </td>\
                <td>\
                  <input required class="form-control item_name' + rw + '" type="text" name="item_name[' + rw + ']">\
                </td>\
                <td>\
                  <input required class="form-control item_size' + rw + '" type="text" name="item_size[' + rw + ']">\
                </td>\
                <td>\
                  <input required class="form-control item_total' + rw + '" type="number" min="1" name="item_total[' + rw + ']">\
                </td>\
              </tr>';

      $('.itm tbody').append(tbody)
    })


    function checkRowVal(tv) {

      let ret = false

      $('.stable tr').each(function(a, b) {
        let value = $('.sc', b).text();
        console.log(value)

        if (value == tv) {
          ret = true
        }
      });

      return ret
    }


    $(document).on('click', '.remove, .del', function() {
      if (confirm("Yakin menghapus?")) {
        $(this).parent().parent().parent().remove();
      }
    })

  })
</script>
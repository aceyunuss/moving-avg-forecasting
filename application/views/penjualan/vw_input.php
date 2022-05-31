<form method="POST" action="<?= site_url('penjualan/sb_input') ?>">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form</h4>
        <br>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Tanggal</label>
          <div class="col-sm-3">
            <input type="date" class="form-control" name="tanggal" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Customer</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="cust" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">No. PO</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="po" required>
          </div>
        </div>

        <hr>
        <br>

        <table class="itm table table-hover table-lg mt-lg mb-0">
          <thead>
            <tr>
              <th style="text-align:center; width: 10%">#</th>
              <th style="text-align:center; width: 50%">Nama</th>
              <th style="text-align:center; width: 20%">Ukuran</th>
              <th style="text-align:center; width: 20%">Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr data-row='0'>
              <td>
              </td>
              <td>
                <input required class="form-control item_name0" type="text" name="item_name[0]">
              </td>
              <td>
                <input required class="form-control item_size0" type="text" name="item_size[0]">
              </td>
              <td>
                <input required class="form-control item_total0" type="number" min="1" name="item_total[0]">
              </td>
            </tr>
          </tbody>
        </table>
        <br>
        <button class="add btn btn-success mr-2"> Tambah Barang </button>
        <br>
        <br>
        <hr>

        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
        <button class="btn btn-light" onclick="window.history.go(-1);">Cancel</button>
      </div>
    </div>
  </div>
</form>


<script>
  $(document).ready(function() {

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
<div class="container-fluid">
    <h2><?php echo "Buat data siswa"; ?></h2>

    <?php echo validation_errors(); ?>
    <?php echo form_open('invoice/create'); ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Invoice</h6>
            </div>
            <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">No Invoice</label>
                    <input type="text" name="no_invoice" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No Invoice">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Customer</label>
                    <select name="customer_id" class="js-example-basic-single form-control" name="state">
                        <?php foreach($customers as $key => $customer) : ?>
                          <option value="<?= $customer['id'] ?>"><?= $customer['nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                  </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Produk</label>
                    <select class="js-example-basic-single form-control input-nama-produk" name="state">
                        <?php foreach($produks as $key => $produk) : ?>
                          <option value="<?= $produk['id'] ?>" data-harga="<?= $produk['harga'] ?>"><?= $produk['nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="text" name="quantiti" class="form-control input-nama-qty" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Quantity">
                  </div>
                  <button type="submit" class="btn btn-primary btn-add-produk">Tambah</button>
               </div>
            </div>


            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                    Data Produk</h6>
                </div>
                <div class="card-body">
                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Quantity</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody class="table-produk">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
          <button type="submit" class="btn btn-primary">Tambah</button>

    </form>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();

        $(".btn-add-produk").click(function(){
            var produk_id = $(".input-nama-produk").val();
            var name = $(".input-nama-produk").find('option:selected').html();
            var qty = $(".input-nama-qty").val();
            var harga = $(".input-nama-produk").find('option:selected').attr('data-harga');
            if(!qty){
                alert("Masukan harga terlebih dahulu");
                return false;
            }
            $(".table-produk").append("\
                <tr>\
                    <td>\
                        "+name+"\
                        <input type='hidden' name='produk[]' class='form-control input-nama-qty' id='exampleInputEmail1' aria-describedby='emailHelp' value='"+produk_id+"'>\
                    </td>\
                    <td>\
                        "+qty+"\
                          <input type='hidden' name='quantity[]' class='form-control input-nama-qty' id='exampleInputEmail1' aria-describedby='emailHelp' value='"+qty+"'>\
                    </td>\
                    <td>\
                        "+harga+"\
                    </td>\
                </tr>\
            ")
            return false;
        })
    });
</script>

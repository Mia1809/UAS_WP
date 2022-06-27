<div class="container-fluid">
    <h2><?php echo "Buat data siswa"; ?></h2>
<p><a href="<?php echo site_url('invoice/print/'.$invoice['id']); ?>" class="btn btn-primary">Print Invoice</a></p>


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Invoice</h6>
            </div>
            <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">No Invoice</label>
                    <input type="text" name="no_invoice" class="form-control" id="exampleInputEmail1" value="<?= $invoice['no_invoice'] ?>" readonly aria-describedby="emailHelp" placeholder="No Invoice">
                  </div>
                  <div class="form-group">
                                         <?php $query = $this->db->get_where('customer', ['id'=>$invoice['customer_id']]);
                                         $customer = $query->row_array();
                                          ?>
                    <label for="exampleInputEmail1">Customer</label>
                    <input type="text" name="no_invoice" class="form-control" id="exampleInputEmail1" value="<?= $customer['nama'] ?>" readonly aria-describedby="emailHelp" placeholder="No Invoice">
                  </div>
            </div>
        </div>

        <div class="card shadow mb-4">


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
                            <?php foreach ($invoiceItems as $key => $invoiceItem) : ?>
                            <tr>
                                <td>

                                         <?php $query = $this->db->get_where('produk', ['id'=>$invoiceItem['produk_id']]);
                                         $produk = $query->row_array();
                                         
                                         echo $produk['nama'];
                                          ?>
                                </td>
                                <td>
                                    <?= $invoiceItem['quantity'] ?>
                                </td>
                                <td>
                                    <?= $produk['harga'] ?>
                                    
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();

        $(".btn-add-produk").click(function(){
            var produk_id = $(".input-nama-produk").val();
            var name = $(".input-nama-produk").html();
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
                        <input type='text' name='produk[]' class='form-control input-nama-qty' id='exampleInputEmail1' aria-describedby='emailHelp' value='"+produk_id+"'>\
                    </td>\
                    <td>\
                        "+qty+"\
                          <input type='text' name='quantity[]' class='form-control input-nama-qty' id='exampleInputEmail1' aria-describedby='emailHelp' value='"+qty+"'>\
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

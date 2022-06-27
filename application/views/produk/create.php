<div class="container-fluid">
    <h2><?php echo "Buat data produk"; ?></h2>

    <?php echo validation_errors(); ?>
    <?php echo form_open('produk/create'); ?>


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Produk Example</h6>
            </div>
            <div class="card-body">
                <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input type="text" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Harga">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori</label>
                     <select name="kategori_id" class="js-example-basic-single form-control" name="state">
                        <?php foreach($kategoris as $key => $kategori) : ?>
                          <option value="<?= $kategori['id'] ?>"><?= $kategori['nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">stok</label>
                    <input type="text" name="stok" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="stok">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </form>
</div>
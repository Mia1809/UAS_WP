<div class="container-fluid">
    <h2><?php echo "Buat data siswa"; ?></h2>

    <?php echo validation_errors(); ?>
    <?php echo form_open('customer/create'); ?>


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data customer Example</h6>
            </div>
            <div class="card-body">
                <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <textarea name="alamat" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No Tlpn</label>
                    <input type="text" name="no_tlpn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="no_tlpn">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </form>
</div>
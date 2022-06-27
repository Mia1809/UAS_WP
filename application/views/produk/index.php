<div class="container-fluid">
 
  <div class="alert alert-success" role="alert">
    <i class="fas fa-tachometer-alt"></i>  Daftar Produk
  </div>
  <h2><?php echo "Data produk"; ?></h2>
<p><a href="<?php echo site_url('produk/create'); ?>">Buat data produk</a></p>

<?php if($produks) : ?>
	<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Produk Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php foreach ($produks as $produk): ?>
							<tr>
							        <td>
							             <?php echo $produk['nama']; ?>   
							        </td>
							        <td>
							             <?php echo $produk['harga']; ?>   
							        </td>
							        <td>
                                         <?php $query = $this->db->get_where('kategori', ['id'=>$produk['kategori_id']]);
                                         $kategori = $query->row_array();
                                          ?>
							             <?php echo $kategori['nama']; ?>   
							        </td>
                                    <td>
                                         <?php echo $produk['stok']; ?>   
                                    </td>
							</tr>
							<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php endif ?>
</div>
<div class="container-fluid">
 
  <div class="alert alert-success" role="alert">
    <i class="fas fa-tachometer-alt"></i>  Daftar kategori
  </div>
  <h2><?php echo "Data kategori"; ?></h2>
<p><a href="<?php echo site_url('kategori/create'); ?>">Buat data kategori</a></p>

<?php if($kategoris) : ?>
	<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data kategori Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
							<?php foreach ($kategoris as $kategori): ?>
							<tr>
							        <td>
							             <?php echo $kategori['nama']; ?>   
							        </td>

                                    <td>
                                        <a href="<?= site_url('kategori/edit/' . $kategori['id']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> </a>
                                        <a href="<?= site_url('kategori/hapus/' . $kategori['id']) ?>" data="<?= $kategori['nama'] ?>" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i> </a>
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

<div class="container-fluid">
 
  <div class="alert alert-success" role="alert">
    <i class="fas fa-tachometer-alt"></i>  Daftar customer
  </div>
  <h2><?php echo "Data customer"; ?></h2>
<p><a href="<?php echo site_url('customer/create'); ?>">Buat data customer</a></p>

<?php if($customers) : ?>
	<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data customer Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomor Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php foreach ($customers as $customer): ?>
							<tr>
							        <td>
							             <?php echo $customer['nama']; ?>   
							        </td>
                                    <td>
                                         <?php echo $customer['alamat']; ?>   
                                    </td>
                                    <td>
                                         <?php echo $customer['no_tlpn']; ?>   
                                    </td>

                                    <td>
                                        <a href="<?= site_url('customer/edit/' . $customer['id']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> </a>
                                        <a href="<?= site_url('customer/hapus/' . $customer['id']) ?>" data="<?= $customer['nama'] ?>" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i> </a>
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

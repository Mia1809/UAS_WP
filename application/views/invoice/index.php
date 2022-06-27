<div class="container-fluid">
 
  <div class="alert alert-success" role="alert">
    <i class="fas fa-tachometer-alt"></i>  Daftar invoice
  </div>
  <h2><?php echo "Data invoice"; ?></h2>
<p><a href="<?php echo site_url('invoice/create'); ?>">Buat data invoice</a></p>

<?php if($invoices) : ?>
	<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data invoice Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Customer</th>
                                <th>Nomor Telepon</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php foreach ($invoices as $invoice): ?>
							<tr>
							        <td>
							             <?php echo $invoice['no_invoice']; ?>   
							        </td>
                                    <td>
                                         <?php echo $invoice['customer_id']; ?>   
                                         <?php $query = $this->db->get_where('customer', ['id'=>$invoice['customer_id']]);
                                         $customer = $query->row_array();
                                            echo $customer['nama'];
                                          ?>
                                    </td>

                                    <td>
                                        <a href="<?= site_url('invoice/view/' . $invoice['id']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> </a>
                                        <a href="<?= site_url('invoice/edit/' . $invoice['id']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> </a>
                                        <a href="<?= site_url('invoice/hapus/' . $invoice['id']) ?>" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i> </a>
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

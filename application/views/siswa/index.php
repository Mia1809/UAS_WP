<h2><?php echo "Data Siswa"; ?></h2>
<p><a href="<?php echo site_url('siswa/create'); ?>">Buat data siswa</a></p>

<?php if($siswas) : ?>
<table>
<tr>
        <th>
                NIS
        </th>
        <th>
                Kelas
        </th>
        <th>
                Tanggal Lhir
        </th>
        <th>
                Alamat
        </th>
        <th>
                Jenis Kelamin
        </th>
        <th>
                Agama
        </th>
</tr>
<?php foreach ($siswas as $siswa): ?>
<tr>
        <td>
             <?php echo $siswa['nis']; ?>   
        </td>
        <td>
             <?php echo $siswa['kelas']; ?>   
        </td>
        <td>
             <?php echo $siswa['alamat']; ?>   
        </td>
        <td>
             <?php echo $siswa['jenis_kelamin']; ?>   
        </td>
        <td>
             <?php echo $siswa['agama']; ?>   
        </td>
</tr>
<?php endforeach; ?>
</table>
<?php endif ?>
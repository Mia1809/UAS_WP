<h2><?php echo "Buat data siswa"; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/create'); ?>

    <label for="title">nis</label>
    <input type="text" name="nis" /><br />
    <label for="title">kelas</label>
    <input type="text" name="kelas" /><br />
    <label for="title">tempat lahir</label>
    <input type="text" name="tempat lahir" /><br />
    <label for="title">tanggal_lahir</label>
    <input type="text" name="tanggal_lahir" /><br />

    <label for="text">Alamat</label>
    <textarea name="alamat"></textarea><br />

    <input type="submit" name="submit" value="Simpan" />

</form>
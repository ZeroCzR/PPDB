<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta'); ?>
    <title>Tambah Pendaftaran &mdash; Admin EEPROM</title>
</head>
<body>
  <?php $this->load->view('header_admin'); ?>
  <section class="main-content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <h3>Tambah Pendaftaran</h3>
          <br>
          <form action="<?php echo base_url() . "index.php/pendaftaran/proses_tambah_pendaftaran"; ?>" method="POST">
            <div class="form-group">
              <label>Nama Peserta</label>
              <input type="text" class="form-control" name="nama_peserta" required="required">
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" class="form-control" name="tempat_lahir" required="required">
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" class="form-control" name="tgl_lahir" required="required">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="jenkel" class="form-control">
                <option value="L" selected="selected">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat" required="required">
            </div>
            <div class="form-group">
              <label>Asal Sekolah</label>
              <input type="text" class="form-control" name="asal_sekolah" required="required">
            </div>
            <div class="form-group">
              <label>Nama Wali</label>
              <input type="text" class="form-control" name="nama_wali" required="required">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>&nbsp;
            <a href="<?php echo base_url() . "index.php/pendaftaran"; ?>"><button class="btn btn-danger" type="button">Batal</button></a>
          </form>
        </div>
      </div>      
    </div>
  </section>
  <?php $this->load->view('footer_admin'); ?>
</body>
</html>
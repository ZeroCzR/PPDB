<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta'); ?>
    <title>Tambah Prestasi &mdash; Admin EEPROM</title>
</head>
<body>
  <?php $this->load->view('header_admin'); ?>
  <section class="main-content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <h3>Tambah Prestasi</h3>
          <br>
          <form action="<?php echo base_url() . "index.php/prestasi/proses_tambah_prestasi"; ?>" method="POST">
            <div class="form-group">
              <label>Nama Peserta</label>
              <select name="fk_id_pendaftaran" class="form-control" required="required">
                <option value="" selected="selected">Pilih peserta</option>
                <?php foreach($data_pendaftaran as $pendaftaran) { ?>
                <option value="<?php echo $pendaftaran['id_pendaftaran']; ?>"><?php echo $pendaftaran['nama_peserta']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Tingkatan</label>
              <select name="tingkatan" class="form-control" required="required">
                <option value="" selected="selected">Pilih tingkatan</option>
                <option value="1">Juara 1</option>
                <option value="2">Juara 2</option>
                <option value="3">Juara 3</option>
              </select>
            </div>
            <div class="form-group">
              <label>Prestasi</label>
              <input type="text" class="form-control" name="nama_prestasi" required="required">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>&nbsp;
            <a href="<?php echo base_url() . "index.php/prestasi"; ?>"><button class="btn btn-danger" type="button">Batal</button></a>
          </form>
        </div>
      </div>      
    </div>
  </section>
  <?php $this->load->view('footer_admin'); ?>
</body>
</html>
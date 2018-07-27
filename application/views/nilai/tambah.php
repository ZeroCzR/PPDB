<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta'); ?>
    <title>Tambah Nilai &mdash; Admin EEPROM</title>
</head>
<body>
  <?php $this->load->view('header_admin'); ?>
  <section class="main-content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <h3>Tambah Nilai</h3>
          <br>
          <form action="<?php echo base_url() . "index.php/nilai/proses_tambah_nilai"; ?>" method="POST">
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
              <label>Rata-rata Semester</label>
              <input type="text" class="form-control" name="rata_semester" required="required">
            </div>
            <div class="form-group">
              <label>Rata-rata UN</label>
              <input type="text" class="form-control" name="rata_un" required="required">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>&nbsp;
            <a href="<?php echo base_url() . "index.php/nilai"; ?>"><button class="btn btn-danger" type="button">Batal</button></a>
          </form>
        </div>
      </div>      
    </div>
  </section>
  <?php $this->load->view('footer_admin'); ?>
</body>
</html>
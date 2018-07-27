<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta'); ?>
    <title>Input Nilai &mdash; Admin EEPROM</title>
</head>
<body>
  <section class="main-content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <h3>Input Nilai</h3>
          <br>
          <form action="<?php echo base_url() . "index.php/dashboard/proses_tambah_nilai"; ?>" method="POST">
            <input type="hidden" name="fk_id_pendaftaran" value="<?php echo $data_pendaftaran[0]['id_pendaftaran']; ?>">
            <div class="form-group">
              <label>Nama Peserta</label>
              <input type="text" class="form-control" name="nama_peserta" value="<?php echo $data_pendaftaran[0]['nama_peserta']; ?>" readonly="readonly">
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
</body>
</html>
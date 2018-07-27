<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta'); ?>
    <title>Hapus Nilai &mdash; Admin EEPROM</title>
</head>
<body>
  <?php $this->load->view('header_admin'); ?>
  <section class="main-content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <h3>Hapus Nilai</h3>
          <br>
          <form action="<?php echo base_url() . "index.php/nilai/proses_hapus_nilai"; ?>" method="POST">
            <input type="hidden" name="id_nilai" value="<?php echo $nilai[0]['id_nilai']; ?>">
            <div class="form-group">
              <label>Nama Peserta</label>
              <select name="fk_id_pendaftaran" class="form-control" readonly="readonly">
                <option value="" selected="selected">Pilih peserta</option>
                <?php foreach($data_pendaftaran as $pendaftaran) { ?>
                <option value="<?php echo $pendaftaran['id_pendaftaran']; ?>" <?php echo ($pendaftaran['id_pendaftaran'] == $nilai[0]['fk_id_pendaftaran'] ? 'selected="selected"' : ''); ?>><?php echo $pendaftaran['nama_peserta']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Rata-rata Semester</label>
              <input type="text" class="form-control" name="rata_semester" readonly="readonly" value="<?php echo $nilai[0]['rata_semester']; ?>">
            </div>
            <div class="form-group">
              <label>Rata-rata UN</label>
              <input type="text" class="form-control" name="rata_un" readonly="readonly" value="<?php echo $nilai[0]['rata_un']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Hapus</button>&nbsp;
            <a href="<?php echo base_url() . "index.php/nilai"; ?>"><button class="btn btn-danger" type="button">Batal</button></a>
          </form>
        </div>
      </div>      
    </div>
  </section>
  <?php $this->load->view('footer_admin'); ?>
</body>
</html>
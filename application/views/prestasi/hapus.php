<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta'); ?>
    <title>Hapus Prestasi &mdash; Admin EEPROM</title>
</head>
<body>
  <?php $this->load->view('header_admin'); ?>
  <section class="main-content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <h3>Hapus Prestasi</h3>
          <br>
          <form action="<?php echo base_url() . "index.php/prestasi/proses_hapus_prestasi"; ?>" method="POST">
            <input type="hidden" name="id_prestasi" value="<?php echo $prestasi[0]['id_prestasi']; ?>">
            <div class="form-group">
              <label>Nama Peserta</label>
              <select name="fk_id_pendaftaran" class="form-control" readonly="readonly">
                <option value="" selected="selected">Pilih peserta</option>
                <?php foreach($data_pendaftaran as $pendaftaran) { ?>
                <option value="<?php echo $pendaftaran['id_pendaftaran']; ?>" <?php echo ($pendaftaran['id_pendaftaran'] == $prestasi[0]['fk_id_pendaftaran'] ? 'selected="selected"' : ''); ?>><?php echo $pendaftaran['nama_peserta']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Tingkatan</label>
              <select name="tingkatan" class="form-control" readonly="readonly">
                <option value="" selected="selected">Pilih tingkatan</option>
                <option value="1" <?php echo ($prestasi[0]['tingkatan'] == '1' ? 'selected="selected"' : ''); ?>>Juara 1</option>
                <option value="2" <?php echo ($prestasi[0]['tingkatan'] == '2' ? 'selected="selected"' : ''); ?>>Juara 2</option>
                <option value="3" <?php echo ($prestasi[0]['tingkatan'] == '3' ? 'selected="selected"' : ''); ?>>Juara 3</option>
              </select>
            </div>
            <div class="form-group">
              <label>Prestasi</label>
              <input type="text" class="form-control" name="nama_prestasi" readonly="readonly" value="<?php echo $prestasi[0]['nama_prestasi']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Hapus</button>&nbsp;
            <a href="<?php echo base_url() . "index.php/prestasi"; ?>"><button class="btn btn-danger" type="button">Batal</button></a>
          </form>
        </div>
      </div>      
    </div>
  </section>
  <?php $this->load->view('footer_admin'); ?>
</body>
</html>
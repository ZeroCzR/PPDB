<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta'); ?>
    <title>Data Prestasi &mdash; Admin EEPROM</title>
</head>
<body>
  <?php $this->load->view('header_admin'); ?>
  <section class="main-content">
    <div class="container">
      <div class="row">
        <div class="col">
          <?php if($this->session->flashdata('prestasi_sukses')) { ?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('prestasi_sukses'); ?></div>
          <?php } ?>

          <?php if($this->session->flashdata('prestasi_gagal')) { ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('prestasi_gagal'); ?></div>
          <?php } ?>
          
          <a href="<?php echo base_url() . "index.php/prestasi/tambah_prestasi"; ?>"><button type="button" class="btn btn-primary btn-sm float-right" style="border-radius: 0;">Tambah Prestasi</button></a>
          <h3>Data Prestasi</h3>
          <br>
          <table id="dataTable" class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Nama Peserta</th>
                <th>Tingkatan</th>
                <th>Prestasi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 0; ?>
            <?php if($data_prestasi) { ?>
            <?php foreach($data_prestasi as $prestasi) { ?>
            <?php
              $pendaftaran = $this->db->where(array('id_pendaftaran' => $prestasi['fk_id_pendaftaran']));
              $pendaftaran = $this->db->get('pendaftaran');
              $data_pendaftaran = $pendaftaran->result_array();
            ?>
              <tr>
                <td><?php echo ++$i; ?></td>
                <td><?php echo $data_pendaftaran[0]['nama_peserta']; ?></td>
                <td><?php echo $prestasi['tingkatan']; ?></td>
                <td><?php echo $prestasi['nama_prestasi']; ?></td>
                <td>
                  <a href="<?php echo base_url() . "index.php/prestasi/perbarui_prestasi/" . $prestasi['id_prestasi']; ?>"><button type="button" class="btn btn-success btn-sm">Perbarui</button></a>&nbsp;
                  <a href="<?php echo base_url() . "index.php/prestasi/hapus_prestasi/" . $prestasi['id_prestasi']; ?>"><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>
                </td>
              </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
              <td class="text-center" colspan="5">Tidak ada prestasi.</td>
            </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>      
    </div>
  </section>
  <?php $this->load->view('footer_admin'); ?>
</body>
</html>
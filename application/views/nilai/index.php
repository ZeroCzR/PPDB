<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta'); ?>
    <title>Data Nilai &mdash; Admin EEPROM</title>
</head>
<body>
  <?php $this->load->view('header_admin'); ?>
  <section class="main-content">
    <div class="container">
      <div class="row">
        <div class="col">
          <?php if($this->session->flashdata('nilai_sukses')) { ?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('nilai_sukses'); ?></div>
          <?php } ?>

          <?php if($this->session->flashdata('nilai_gagal')) { ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('nilai_gagal'); ?></div>
          <?php } ?>
          
          <?php if($this->session->userdata('role') == '0') { ?>
          <a href="<?php echo base_url() . "index.php/nilai/tambah_nilai"; ?>"><button type="button" class="btn btn-primary btn-sm float-right" style="border-radius: 0;">Tambah Nilai</button></a>
          <?php } ?>

          <h3>Data Nilai</h3>
          <br>
          <table id="dataTable" class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Nama Peserta</th>
                <th>Rata-rata Semester</th>
                <th>Rata-rata UN</th>
                <th>Nilai Akhir</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 0; ?>
            <?php if($data_nilai) { ?>
            <?php foreach($data_nilai as $nilai) { ?>
            <?php
              $pendaftaran = $this->db->where(array('id_pendaftaran' => $nilai['fk_id_pendaftaran']));
              $pendaftaran = $this->db->get('pendaftaran');
              $data_pendaftaran = $pendaftaran->result_array();
            ?>
              <tr>
                <td><?php echo ++$i; ?></td>
                <td><?php echo $data_pendaftaran[0]['nama_peserta']; ?></td>
                <td><?php echo $nilai['rata_semester']; ?></td>
                <td><?php echo $nilai['rata_un']; ?></td>
                <td><?php echo $nilai['nilai_akhir']; ?></td>
                <td>
                  <?php if($this->session->userdata('role') == '0') { ?>
                  <a href="<?php echo base_url() . "index.php/nilai/perbarui_nilai/" . $nilai['id_nilai']; ?>"><button type="button" class="btn btn-success btn-sm">Perbarui</button></a>&nbsp;
                  <a href="<?php echo base_url() . "index.php/nilai/hapus_nilai/" . $nilai['id_nilai']; ?>"><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>
                  <?php } else { ?>
                  -
                  <?php } ?>
                </td>
              </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
              <td class="text-center" colspan="6">Tidak ada nilai.</td>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta'); ?>
    <title>Data Pendaftaran &mdash; Admin</title>
</head>
<body>
  <?php $this->load->view('header_admin'); ?>
  <section class="main-content">
    <div class="container">
      <div class="row">
        <div class="col">
          <?php if($this->session->flashdata('pendaftaran_sukses')) { ?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('pendaftaran_sukses'); ?></div>
          <?php } ?>

          <?php if($this->session->flashdata('pendaftaran_gagal')) { ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('pendaftaran_gagal'); ?></div>
          <?php } ?>
          
          <a href="<?php echo base_url() . "index.php/pendaftaran/tambah_pendaftaran"; ?>"><button type="button" class="btn btn-primary btn-sm float-right" style="border-radius: 0;">Tambah Pendaftaran</button></a>
          <h3>Data Pendaftaran</h3>
          <br>
          <table id="dataTable" class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Asal Sekolah</th>
                <th>Reg ID</th>
                <th>Password</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 0; ?>
            <?php if($data_pendaftaran) { ?>
            <?php foreach($data_pendaftaran as $pendaftaran) { ?>
              <tr>
                <td><?php echo ++$i; ?></td>
                <td><?php echo $pendaftaran['nama_peserta']; ?></td>
                <td><?php echo $pendaftaran['jenkel']; ?></td>
                <td><?php echo $pendaftaran['asal_sekolah']; ?></td>
                <td><?php echo $pendaftaran['regid']; ?></td>
                <td><?php echo $pendaftaran['origin_password']; ?></td>
                <td>
                  <a href="<?php echo base_url() . "index.php/pendaftaran/perbarui_pendaftaran/" . $pendaftaran['id_pendaftaran']; ?>"><button type="button" class="btn btn-success btn-sm">Perbarui</button></a>&nbsp;
                  <a href="<?php echo base_url() . "index.php/pendaftaran/hapus_pendaftaran/" . $pendaftaran['id_pendaftaran']; ?>"><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>
                </td>
              </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
              <td class="text-center" colspan="7">Tidak ada pendaftaran.</td>
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
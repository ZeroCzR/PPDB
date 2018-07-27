<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta'); ?>
    <title>Laporan Data Karyawan &mdash; Admin EEPROM</title>
</head>
<body>
  <section class="main-content">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h5>POLITEKNIK NEGERI MALANG</h5>
          <h6>JURUSAN TEKNOLOGI INFORMASI</h6>
          <p class="text-muted">Jalan Soekarno Hatta No. 4 Malang, Indonesia<br/>Telp. (0321) 4826738</p>
        </div>
      </div>
      <hr>
      <br>
      <div class="row">
          <div class="col">
            <h5>Laporan Data Karyawan</h5>
            <table class="table table-striped">
              <thead class="bg-dark text-white">
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Kontak</th>
                </tr>
              </thead>
              <tbody>
              <?php $i = 0;?>
              <?php foreach($data_karyawan as $karyawan) { ?>
                <tr>
                  <td><?php echo ++$i; ?></td>
                  <td><?php echo $karyawan['nama_karyawan']; ?></td>
                  <td><?php echo $karyawan['jk_karyawan']; ?></td>
                  <td><?php echo $karyawan['kontak_karyawan']; ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table> 
          </div>
      </div>      
    </div>
  </section>
</body>
</html>
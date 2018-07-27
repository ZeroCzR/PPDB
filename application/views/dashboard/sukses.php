<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta'); ?>
    <title>Input Sukses &mdash;</title>
</head>
<body>
  <section class="main-content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col">
            <h1>
                SELAMAT DATA ANDA BERHASIL DIINPUTKAN<br>SILAHKAN TUNGGU PENGUMUMAN UNTUK MELIHAT HASIL
            </h1>
            <a href = "<?php echo base_url() . "index.php/dashboard/proses_logout"; ?>">
                <button type="submit" class="btn btn-primary">Log Out</button>
            </a>
        </div>
      </div>      
    </div>
  </section>
</body>
</html>
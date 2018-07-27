<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta'); ?>
    <title>Login Peserta Didik Baru &mdash; Admin EEPROM</title>
</head>
<body>
  <section class="main-content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <h1 class="text-center">Login Peserta Didik Baru</h1>
          <br>
          <div class="card">
            <div class="card-body">
              <legend>Login</legend>
              <form action="<?php echo base_url() . "index.php/dashboard/proses_login"; ?>" method="POST">
                <div class="form-group">
                  <label>Registrasi ID</label>
                  <input type="text" name="regid" class="form-control" required="required">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" required="required">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>      
    </div>
  </section>
</body>
</html>
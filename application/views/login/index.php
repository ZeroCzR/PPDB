<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('meta'); ?>
    <title>Login &mdash; Admin PPDB</title>
</head>
<body>
  <section class="main-content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <h1 class="text-center">LOG IN</h1>
          <br>
          <div class="card">
            <div class="card-body">
              <legend>Login</legend>
              <form action="<?php echo base_url() . "index.php/admin/proses_login"; ?>" method="POST">
                <div class="form-group">
                  <label for="inputUsername">Username</label>
                  <input type="text" name="username" id="inputUsername" class="form-control" required="required" maxlength="20">
                </div>
                <div class="form-group">
                  <label for="inputPassword">Password</label>
                  <input type="password" name="password" id="inputPassword" class="form-control" required="required">
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
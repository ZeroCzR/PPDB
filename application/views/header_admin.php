  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Web Application</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <?php if($this->session->userdata('role') == '0') { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . "index.php/pendaftaran"; ?>">Pendaftaran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . "index.php/prestasi"; ?>">Prestasi</a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . "index.php/nilai"; ?>">Nilai</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo "Hai, " . $this->session->userdata('username');?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url() . "index.php/admin/proses_logout"; ?>">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=base_url()?>">Aldrey Safwa</a>
    </div>
    <!-- Collection of nav links and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
           <li><a href="<?=base_url()?>home">Home</a></li>
           <li><a href="<?=base_url()?>contact">Contact</a></li>
           <li><a href="<?=base_url()?>about">About</a></li>
           <li><a href="<?php echo site_url()?>Artikel_Controller/">News</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="glyphicon glyphicon-user"></i> Aldrey Safwa</a></li>
        </ul>
    </div>
</nav>

<div class="container">
  <section id="contact">
    <div class="container">  
      <div class="col-xs-12 col-sm-9 col-md-9">
        <div class="well well-sm">
            <center><h2><?php echo $data['title']?></h2></center>
            <p align="left"><b>Datepost : <?php echo $data['datepost'] ?></b></p>
            <p align="right"><b>Posting by : <?php echo $data['author']?></b></p>
            <hr>
            <center>
              <img src="<?php echo base_url().'assets/img/'.$data['image'];?>" width="200px" height="200px">
            </center>
            <br>
            <p>
              <?php echo $data['content']; ?>
            </p>
        </div>
      </div>
    </div>
  </section>
</div>

</body>
  <script src="<?=base_url()?>assets/bootstrap/js/jquery.js"></script>
  <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
</html>
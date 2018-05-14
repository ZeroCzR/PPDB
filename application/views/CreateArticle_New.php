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
    <?php 
      echo form_open_multipart('Artikel_Controller/insert_news');
    ?>
    <div class="well well-sm">
      <h3><strong>News</strong></h3>
    </div>
        <label>Author</label>
        <input type="text" class="form-control" name="title"><br>
        <label>Author</label>
        <input type="text" class="form-control" name="author"><br>
        <label>Content</label>
        <textarea name="content" class="form-control" style="height:300px;"></textarea><br>
        <label>You can upload file by type: .jpg .jpeg .png</label>
        <input type="file" name="image" required=""><br>
        <input type="submit" class="btn btn-primary" value="Posting"><hr>
        <?php
          if(validation_errors()){
            echo "<div class='alert alert-danger'>
                <strong>Danger!</strong>".validation_errors()."
                </div>"
                ;
          }
        ?>
  </div>
</section>
</div>
</body>
  <script src="<?=base_url()?>assets/bootstrap/js/jquery.js"></script>
  <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
</html>
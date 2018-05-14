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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
    $('#user').DataTable();
} );
  </script>
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
           <li><a href="<?=base_url()?>Ppdb_Controller">User</a></li>
           <li><a href="<?=base_url()?>about">About</a></li>
           <li><a href="<?php echo site_url()?>Ppdb_Controller/">News</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="glyphicon glyphicon-user"></i> Aldrey Safwa</a></li>
        </ul>
    </div>
</nav>
<div class="container">

<section id="contact">
  <div class="container">
    <div class="well well-sm">
      <h3><strong>News</strong></h3>
    </div>
    <a href="<?php echo base_url().'Ppdb_Controller/insert_news'?>" class="btn btn-danger">Add News</a><br>
  
  <div class="row">
    <br>
    <table id="user" class="table table-striped">
      <thead>
        <tr>
          <th>ID User</th>
          <th>Username</th>
          <th>Password</th>
          <th>Level</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
              <?php
        function limit_words($string, $word_limit){
          $words = explode(" ", $string);
          return implode(" ", array_splice($words, 0, $word_limit));
        }

        foreach ($data -> result_array() as $i) :
          $id_user     = $i['id_user'];
          $username    = $i['username'];
          $password    = $i['password'];
          $level       = $i['level'];
          
      ?>
        <tr>
          <td><?php echo $id_user; ?></td>
          <td><?php echo $username;?></td>
          <td><?php echo $password;?></td>
          <td><?php echo $level;?></td>
          <td>
            <a href="<?php echo site_url('Ppdb_Controller/edit_news/'.$i['id_user'])?>" class="btn btn-warning">Edit</a> &nbsp;
            <a href="<?php echo site_url('Ppdb_Controller/delete_user/'.$i['id_user']) ?>" class="btn btn-danger">Hapus</a>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
    
  </div>

</section>
</div>
</body>
  
  <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
</html>
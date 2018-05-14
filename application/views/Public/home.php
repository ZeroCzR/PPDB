<section id="contact">
  <div class="container">
    <div class="well well-sm">
      <h3><strong><i class="glyphicon glyphicon-ok"></i> Latihan Query CodeIgniter</strong></h3>
    </div>
  
  <div class="row">
    <div class="col-sm-12 col-md-6">
      <div class="table-responsive">
        <h2>Biodata Saya dari array</h2>
        <table class="table">
          <?php foreach ($biodata_array as $key) { ?>
          
          <tr>
            <td width="15%">Nama</td>
            <td>:</td>
            <td><?=$key['nama']?></td>
          </tr>
          <tr>
            <td>NIM</td>
            <td>:</td>
            <td><?=$key['nim']?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?=$key['alamat']?></td>
          </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
</section>
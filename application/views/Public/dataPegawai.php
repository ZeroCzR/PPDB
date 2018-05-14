<section id="contact">
  <div class="container">
    <div class="well well-sm">
      <h3> 
        <?php if($pegawai['namaPegawai']!=null){ ?>
        
        <table width="50%">
          <tr>
            <th>Nama</th>
            <th>:</th>
            <th><?=$pegawai['namaPegawai'];?></th>
          </tr>
          <tr>
            <th>Alamat</th>
            <th>:</th>
            <th><?=$pegawai['alamatPegawai'];?></th>
          </tr>
        </table>
         <?php } ?>
    </div>
  
  <div class="row">
    <div class="col-sm-12 col-md-12">
      <div class="table-responsive">
        <h3>Jumlah Pendidikan <?=$lulusanPegawai->num_rows()?></h3>
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Sekolah</th>
              <th>Tahun Lulus</th>
            </tr>
          </thead>
          <?php $no=1; foreach ($lulusanPegawai->result() as $key) { ?>  
          <tr>
            <td width="15%"><?=$no?></td>
            <td><?=$key->namaSekolah?></td>
            <td><?=$key->tahunLulus?></td>
          </tr>
          <?php $no++; } ?>
        </table>
      </div>
    </div>
  </div>
</section>
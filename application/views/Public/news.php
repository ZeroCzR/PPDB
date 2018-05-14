<section id="contact">
  <div class="container">
    <div class="well well-sm">
      <h3><strong>News</strong></h3>
    </div>
  
  <div class="row">
    <?php for ($a=1; $a<=8; $a++){ ?>
    <div class="col-sm-6 col-md-3">
      <div class="thumbnail">
        <img src="<?=base_url()?>assets/img/img-news.svg" alt="...">
        <div class="caption">
          <h3>Thumbnail label</h3>
          <p>...</p>
          <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
        </div>
      </div>
    </div>
  <?php } ?>
  </div>
</section>
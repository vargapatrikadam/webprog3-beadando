<div class="media">
  <img class="img-thumbnail" style="width: 20%; object-fit: cover;" src="<?php echo base_url($item['picture'])?>">
  <div class="media-body">
  <div class="container">
    <h5 class="mt-0"><?=$item['name']?></h5>
    <?=$item['price']?><?php echo(' Ft')?><br>
    <?=$item['description']?>
  </div>
  </div>
</div>
<?php if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)):?>
  <a class="btn btn-primary" href="<?=site_url('cart/add/'.$item['slug'])?>"><?php echo('Kosárba')?></a>
  <?php if(isset($_SESSION['is_admin']) && ($_SESSION['is_admin'] == TRUE)):?>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Képfeltöltés
  </button>
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
    <?php echo form_open_multipart('ware/'.$item['slug'].'/upload');?>
    <?php echo "<input type='file' name='userfile' size='20' />"; ?>
    <?php echo "<input type='submit' name='submit' value='Feltölt' /> ";?>
    <?php echo "</form>"?>
    </div>
  </div>  
  <?php endif;?>
<?php endif;?>

<p><br/><a class="btn btn-secondary" href="<?=site_url('ware')?>"><?php echo('Vissza')?></a></p>
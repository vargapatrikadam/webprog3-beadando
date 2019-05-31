<div class="media">
  <img class="img-thumbnail" style="width: 20%; object-fit: cover;" src="<?php echo base_url($item['picture'])?>" alt="Generic placeholder image">
  <div class="media-body">
    <h5 class="mt-0"><?=$item['name']?></h5>
    <?=$item['price']?><?php echo(' Ft')?><br>
    <?=$item['description']?>
  </div>
</div>
<?php if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)):?>
                <a href="<?=site_url('cart/add/'.$item['slug'])?>"><?php echo('Kosárba')?></a>
<?php endif;?>
<br/><a href="<?=site_url('ware')?>"><?php echo('Vissza')?><br/></a>
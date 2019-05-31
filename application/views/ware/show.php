<h3><?=$item['name']?></h3>
<p><?=$item['description']?></p>
<p><?=$item['price']?><?php echo(' Ft')?></p>
<?php if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)):?>
                <a href="<?=site_url('cart/add/'.$item['slug'])?>"><?php echo('Kosárba')?></a></br>
<?php endif;?>
<a href="<?=site_url('ware')?>"><?php echo('Vissza')?><br/></a>

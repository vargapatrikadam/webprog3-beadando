<?php if($items != null || !empty($items)): ?> 
    <h2><?php echo($sum_price); ?> Ft</h2>
    <a href="<?=site_url('cart/checkout')?>"><?php echo('Megrendel')?></a></br>
    <?php foreach($items as $item): ?>
        <div>
            <h3><?=$item['name']?></h3>
            <p><?=$item['price']?><?php echo(' Ft')?></p>
            <a href="<?=site_url('ware/'.$item['slug'])?>"><?php echo('Megnéz')?></a></br>
            <a href="<?=site_url('cart/remove/'.$item['id'])?>"><?php echo('Töröl')?></a></br>
        </div>
    <?php endforeach;?>
<?php else: ?>
    <?php echo('Nincsenek áruk a kosárban!')?><br/>
<?php endif; ?>


<?php if($items != null || !empty($items)): ?> 
    <h1>Kosár</h1>
    <h2><?php echo($sum_price); ?> Ft</h2>
    <a href="<?=site_url('cart/checkout')?>"><?php echo('Megrendel')?></a></br>
    <?php foreach($items as $item): ?>
        <ul>
            <li class="media">
                <img class="mr-3" style="width: 64px; height: 64px; object-fit: cover;" alt="Generic placeholder image" src="<?php echo base_url($item['picture'])?>"/>
                <div class="media-body">
                    <h5 class="mt-0 mb-1"><?=$item['name']?></h5>
                    <?=$item['price']?><?php echo(' Ft')?>
                    <a href="<?=site_url('ware/'.$item['slug'])?>"><?php echo('Megnéz')?></a>
                    <a href="<?=site_url('cart/remove/'.$item['id'])?>"><?php echo('Töröl')?></a>
                </div>
            </li>
        </ul>
    <?php endforeach;?>
<?php else: ?>
    <?php echo('Nincsenek áruk a kosárban!')?><br/>
<?php endif; ?>


<?php if($items != null || !empty($items)): ?> 
    <h3>Összes árucikk</h3>
    <?php foreach($items as $item): ?>
        <ul>
            <li class="media">
                <img class="mr-3" style="width: 64px; height: 64px; object-fit: cover;"  src="<?php echo base_url($item['picture'])?>"/>
                <div class="media-body">
                    <h5 class="mt-0 mb-1"><?=$item['name']?></h5>
                    <?=$item['price']?><?php echo(' Ft')?><br/>
                    <a class="btn btn-primary btn-sm" href="<?=site_url('ware/'.$item['slug'])?>"><?php echo('Megnéz')?></a>
                    <?php if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)):?>
                        <a class="btn btn-primary btn-sm" href="<?=site_url('cart/add/'.$item['slug'])?>"><?php echo('Kosárba')?></a>
                    <?php endif;?>
                </div>
            </li>
        </ul>
    <?php endforeach;?>
<?php else: ?>
    <?php echo('Nincsenek áruk')?><br/>
<?php endif; ?>


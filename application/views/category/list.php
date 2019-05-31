<?php if($items != null || !empty($items)): ?>  
    <?php foreach($items as $item): ?>
        <div>
            <h3><?=$item['name']?></h3>
            <p><?=$item['price']?><?php echo(' Ft')?></p>
            <a href="<?=site_url('ware/'.$item['slug'])?>"><?php echo('Megnéz')?></a></br>
            <p><?=$item['ware_category_id']?></p>
            <?php if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)):?>
                <a href="<?=site_url('cart/add/'.$item['slug'])?>"><?php echo('Kosárba')?></a></br>
            <?php endif;?>
        </div>
    <?php endforeach;?>
<?php else: ?>
    <?php echo('Nincsenek áruk')?><br/>
<?php endif; ?>
<a href="<?=site_url('ware')?>"><?php echo('Vissza')?><br/></a>

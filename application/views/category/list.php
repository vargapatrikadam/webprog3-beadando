<h2><?=$title?></h2>

<?php if($items != null || !empty($items)): ?>  
    <?php foreach($items as $item): ?>
        <div>
            <h3><?=$item['id']?></h3>
            <p><?=$item['name']?></p>
            <a href="<?=site_url('ware/'.$item['slug'])?>"><?php echo('Megnéz')?></a></br>
            <p><?=$item['ware_category_id']?></p>
        </div>
    <?php endforeach;?>
<?php else: ?>
    <?php echo('Nincsenek áruk')?><br/>
<?php endif; ?>
<a href="<?=site_url('ware')?>"><?php echo('Vissza')?><br/></a>
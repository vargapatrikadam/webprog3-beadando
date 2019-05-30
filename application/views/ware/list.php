<h2><?=$title?></h2>

<?php if($items != null || !empty($items)): ?>
    <div>
        <h3>Kategóriák</h3>
        <?php foreach($categories as $category): ?>
            <a href="<?=site_url('category/'.$category['slug'])?>"><?php echo($category['name'])?></a>
        <?php endforeach;?>
    </div>    
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
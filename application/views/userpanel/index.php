<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div>
<h3><?php echo($title)?></h3>
    <h6>Felhasználónév: <?php echo($user_data['username'])?></h6>
    <h6>Keresztnév: <?php echo($user_data['first_name'])?></h6>
    <h6>Vezetéknév: <?php echo($user_data['last_name'])?></h6>
    <h6>Email cím: <?php echo($user_data['email'])?></h6>
</div>
<p>
<h3>Korábbi vásárlások</h3>
<?php foreach ($user_receipts as $receipt):?>
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="heading<?=$receipt['id']?>">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?=$receipt['id']?>" aria-expanded="true" aria-controls="collapse<?=$receipt['id']?>">
            <?php echo($receipt['date'])?>
        </button>
      </h2>
    </div>
    <div id="collapse<?=$receipt['id']?>" class="collapse show" aria-labelledby="heading<?=$receipt['id']?>" data-parent="#accordionExample">
      <div class="card-body">
            <p>
                Irányítószám: <?php echo($receipt['postal_code'])?><br/>
                Város: <?php echo($receipt['city'])?><br/>
                Utca: <?php echo($receipt['street'])?><br/>
                Házszám: <?php echo($receipt['street_number'])?>
            </p>
            <h4>Vásárolt áruk</h4>
	            <div class="table-responsive">
		            <table class="table table-sm">
			            <tr>
				            <th scope="col">Név</th>
				            <th scope="col">Ár</th>
                            <th scope="col">Áru</th>
			            </tr>
                        <?php foreach($receipt['items'] as $item):?>
			            <tr>
				            <td><?=$item['name']?></td>
				            <td><?=$item['price']?></td>
				            <td><a href="<?=site_url('ware/'.$item['slug'])?>"><?php echo('Megnéz')?></a></td>
			            </tr>
                        <?php endforeach;?>
		            </table>
	            </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>
</p>
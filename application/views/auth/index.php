<div id="infoMessage"><?php echo $message;?></div>
<div class="container">
	<h1><?php echo lang('index_heading');?></h1>
	<p><?php echo lang('index_subheading');?></p>
	<div class="table-responsive">
		<table class="table table-sm">
			<tr>
				<th scope="col"><?php echo lang('index_fname_th');?></th>
				<th scope="col"><?php echo lang('index_lname_th');?></th>
				<th scope="col"><?php echo lang('index_email_th');?></th>
				<th scope="col"><?php echo lang('index_groups_th');?></th>
				<th scope="col"><?php echo lang('index_status_th');?></th>
				<th scope="col"><?php echo lang('index_action_th');?></th>
			</tr>
			<?php foreach ($users as $user):?>
			<tr>
				<td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
				<td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
				<td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
				<td>
					<?php foreach ($user->groups as $group):?>
						<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
					<?php endforeach?>
				</td>
				<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
				<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
			</tr>
			<?php endforeach;?>
		</table>
	</div>
	<p><?php echo anchor('auth/create_user', lang('index_create_user_link'), array("class"=>"btn btn-primary", "style"=>"margin-right: 5px")); echo anchor('auth/create_group', lang('index_create_group_link'), array("class"=>"btn btn-primary"))?></p>
	<h1>Áruk listája</h1>
	<div class="table-responsive">
		<table class="table table-sm">
			<tr>
				<th scope="col">Azonosító</th>
				<th scope="col">Név</th>
				<th scope="col">Ár</th>
				<th scope="col">Kategória név</th>
			</tr>
			<?php foreach ($wares as $ware):?>
			<tr>
				<td><?=$ware['id']?></td>
				<td><?=$ware['name']?></td>
				<td><?=$ware['price']?></td>
				<td><?=$ware['category_name']?></td>
				<td><a href="<?=site_url('ware/'.$ware['slug'])?>"><?php echo('Megnéz')?></a></td>
                <td><a href="<?=site_url('ware/delete/'.$ware['id'])?>"><?php echo('Töröl')?></a></td>
			</tr>
			<?php endforeach;?>
		</table>
	</div>
	<?php if(isset($_SESSION['success_msg'])): ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $_SESSION['success_msg']; ?></div>
    </div>
	<?php endif;?>
    <?php if(isset($_SESSION['error_msg'])): ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $_SESSION['error_msg']; ?></div>
    </div>
	<?php endif; ?>
	<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
		Áruk importálása CSV-ből
  	</button>
  	<div class="collapse" id="collapseExample">
    	<div class="card card-body">
    		<?php echo form_open_multipart('auth/import');?>
			<?php if(validation_errors()) echo validation_errors(); ?>
    		<?php echo "<input type='file' name='file' size='20' />"; ?>
    		<?php echo "<input type='submit' name='importSubmit' value='Mehet' /> ";?>
    		<?php echo "</form>"?>

			<h5>CSV formátuma</h5>
			<div class="table-responsive">
			<table class="table table-sm">
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Price</th>
				<th scope="col">Description</th>
				<th scope="col">Category</th>
			</tr>
			</table>
	</div>
   		</div>
  	</div>  
</div>

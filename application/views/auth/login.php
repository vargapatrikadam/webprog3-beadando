<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<link href="https://getbootstrap.com/docs/4.3/examples/sign-in/signin.css" rel="stylesheet">
<div class='text-center'>
<?php echo form_open("auth/login", array('class'=>'form-signin'));?>

  <h1 class="h3 mb-3 font-weight-normal">Kérjük jelentkezzen be!</h1>
  <?php echo form_label("Email cím", "inputEmail", array('class'=>'sr-only'))?>
  <?php echo form_input($identity, '', array(
      'type'=>'email',
      'id'=>'inputEmail',
      'class' => 'form-control',
      'placeholder'=>'Email cím'
  ));?>

  <?php echo form_label("Jelszó", "inputPassword", array('class'=>'sr-only'))?>
  <?php echo form_input($password, '', array(
      'type'=>'password',
      'id'=>'inputPassword',
      'class' => 'form-control',
      'placeholder'=>'Jelszó'
  ));?>

  <div class="checkbox mb-3">
    <?php echo form_label("Emlékezz rám", "remember")?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </div>

  <?php echo form_submit('submit', 'Bejelentkezés',array(
    'class'=>'btn btn-lg btn-primary btn-block'
  ));?>

<?php echo form_close();?>
<div class="text-danger">
    <?php
    echo $message;
    ?>
</div>
</h4>
</div>
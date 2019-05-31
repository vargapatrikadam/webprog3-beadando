<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$title?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.3/examples/sign-in/signin.css" rel="stylesheet">
    </head>
<body class='text-center'>

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

<h1 class="h3 mb-3 font-weight-normal"><?php echo $message;?></h1>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
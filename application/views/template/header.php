<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$title?></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->

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
    <link href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/navbar-top-fixed.css" rel="stylesheet">
    </head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#"><?=$title?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?=site_url('ware')?>">Főoldal<span class="sr-only">(current)</span></a>
      </li>
      <?php if($logged_in):?>
        <li class="nav-item">
          <a class="nav-link" href="<?=site_url('cart')?>">Kosár</a>
        </li>
      <?php endif;?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategóriák</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
            <?php foreach($categories as $category): ?>
            <a class="dropdown-item" href="<?=site_url('category/'.$category['slug'])?>"><?php echo($category['name'])?></a>
            <?php endforeach;?>
        </div>
      </li>
    </ul>
    <?php if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)):?>
      <a class="nav-link" href="<?=site_url('user-panel')?>">Felhasználói fiók<span class="sr-only">(current)</span></a>
    <?php endif; ?>
    <?php if($is_admin):?>
      <a class="nav-link" href="<?=site_url('auth')?>">Admin panel<span class="sr-only">(current)</span></a>
    <?php endif;?>
    <?php if($logged_in):?>
      <a class="nav-link" href="<?=site_url('auth/logout')?>">Kijelentkezés<span class="sr-only">(current)</span></a>
    <?php else:?>
      <a class="nav-link" href="<?=site_url('auth/login')?>">Bejelentkezés<span class="sr-only">(current)</span></a>
      <a class="nav-link" href="<?=site_url('register')?>">Regisztráció<span class="sr-only">(current)</span></a>
    <?php endif;?>
  </div>
</nav>

<main role="main" class="container">
  <div class="jumbotron">
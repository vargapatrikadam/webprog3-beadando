<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<link href="../assets/css/signin.css" rel="stylesheet">
<div class='text-center'>
    <?php
    echo isset($_SESSION['auth_message']) ? $_SESSION['auth_message'] : FALSE;
    ?>
    <h2><?php echo($sum_price); ?> Ft</h2>
    <?php echo form_open('cart/order', array('class'=>'form-signin'));?>
        <h1 class="h3 mb-3 font-weight-normal">Rendelés adatai</h1>
        <?php echo form_label('Irányítószám:','postal_code', array('class'=>'sr-only'));?>
        <?php echo form_input('postal_code',set_value('postal_code'), array(
            'type'=>'text',
            'id'=>'postal_code',
            'class' => 'form-control',
            'placeholder'=>'Irányítószám'
        ));?>
        <?php echo form_error('postal_code');?>

        <?php echo form_label('Város:','city', array('class'=>'sr-only'));?>
        <?php echo form_input('city',set_value('city'), array(
            'type'=>'text',
            'id'=>'city',
            'class' => 'form-control',
            'placeholder'=>'Város'
        ));?>
        <?php echo form_error('city');?>

        <?php echo form_label('Utca/út:','street', array('class'=>'sr-only'));?>
        <?php echo form_input('street',set_value('street'), array(
            'type'=>'text',
            'id'=>'street',
            'class' => 'form-control',
            'placeholder'=>'Utca/út'
        ));?>
        <?php echo form_error('street');?>

        <?php echo form_label('Házszám:','street_number', array('class'=>'sr-only'));?>
        <?php echo form_input('street_number',set_value('street_number'), array(
            'type'=>'text',
            'id'=>'street_number',
            'class' => 'form-control',
            'placeholder'=>'Házszám'
        ));?>
        <?php echo form_error('street_number');?>

        <?php echo form_submit('order','Megrendel',array(
            'class'=>'btn btn-lg btn-primary btn-block'
        )); ?>
    <?php echo form_close();?>
</div>
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<link href="https://getbootstrap.com/docs/4.3/examples/sign-in/signin.css" rel="stylesheet">
<div class='text-center'>
    <?php
    echo isset($_SESSION['auth_message']) ? $_SESSION['auth_message'] : FALSE;
    ?>
    <?php echo form_open('register', array('class'=>'form-signin'));?>
        <h1 class="h3 mb-3 font-weight-normal">Regisztráció</h1>
        <?php echo form_label('Keresztnév:','first_name', array('class'=>'sr-only'));?>
        <?php echo form_input('first_name',set_value('first_name'), array(
            'type'=>'text',
            'id'=>'first_name',
            'class' => 'form-control',
            'placeholder'=>'Keresztnév'
        ));?>
        <?php echo form_error('first_name');?>

        <?php echo form_label('Last name:','last_name', array('class'=>'sr-only'));?>
        <?php echo form_input('last_name',set_value('last_name'), array(
            'type'=>'text',
            'id'=>'last_name',
            'class' => 'form-control',
            'placeholder'=>'Vezetéknév'
        ));?>
        <?php echo form_error('last_name');?>

        <?php echo form_label('Username:','username', array('class'=>'sr-only'));?>
        <?php echo form_input('username',set_value('username'), array(
            'type'=>'text',
            'id'=>'username',
            'class' => 'form-control',
            'placeholder'=>'Felhasználónév'
        ));?>
        <?php echo form_error('username');?>

        <?php echo form_label('Email:','email', array('class'=>'sr-only'));?>
        <?php echo form_input('email',set_value('email'), array(
            'type'=>'email',
            'id'=>'email',
            'class' => 'form-control',
            'placeholder'=>'Email cím'
        ));?>
        <?php echo form_error('email');?>

        <?php echo form_label('Password:', 'password', array('class'=>'sr-only'));?>
        <?php echo form_password('password','', array(
            'type'=>'password',
            'id'=>'password',
            'class' => 'form-control',
            'style' => ' border-bottom-width: 0px; margin-bottom: 0px;',
            'placeholder'=>'Jelszó'
        ));?>
        <?php echo form_error('password');?>

        <?php echo form_label('Confirm password:', 'confirm_password', array('class'=>'sr-only'));?>
        <?php echo form_password('confirm_password','', array(
            'type'=>'password',
            'id'=>'confirm_password',
            'class' => 'form-control',
            'placeholder'=>'Jelszó újra'
        ));?>
        <?php echo form_error('confirm_password');?>

        <?php echo form_submit('register','Regisztráció',array(
            'class'=>'btn btn-lg btn-primary btn-block'
        )); ?>
    <?php echo form_close();?>
</div>
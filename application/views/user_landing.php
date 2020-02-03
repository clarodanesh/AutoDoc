<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Login - AutoDoc</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/autodoc-auth.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/autodoc-user.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    
    <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>js/additional-methods.min.js"></script>
</head>
<body>

<div id="form-container">
    <!--<form class="auth-form" action="">-->
    <?php $attr = array('id' => 'book-form'); echo form_open('User_controller/BookAppt', $attr);?>
    <div class="auth-form" id="login-form">
        <div id="auth-form-title">Book an Appointment</div>
        <div id="auth-form-error"><?php if(isset($error)){echo $error;} ?></div>
        <div class="auth-form-section">
            <select name="doc-slct" id="doctor-slct" form="book-form">
            <?php if($doctors=="empty"){return null;}foreach($doctors as $doc):?>
            
                <option value="<?php echo $doc->firstname;?> <?php echo $doc->lastname;?>">Dr. <?php echo $doc->firstname;?> <?php echo $doc->lastname;?></option>
                        
            <?php endforeach;?>
            </select>
        </div>
        
        <div class="auth-form-section">
            <input class="auth-form-input" type="date" name="date" id="date" required>
        </div>
        
        <div class="auth-form-section">
            <input class="auth-form-input" type="time" name="time" id="time" min="09:00" max="17:00" step="1800" required>
        </div>

        <input class="auth-form-primary-btn" id="book-btn" type="submit" value="Book">
    </div>
    <!--</form>-->
    <?php echo form_close();?>
</div>
 
<script src="<?php echo base_url(); ?>js/validation.js"></script>
<script src="<?php echo base_url(); ?>js/user.js"></script>
</body>
</html>

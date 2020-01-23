<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Login - AutoDoc</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/autodoc-auth.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
</head>
<body>

<div id="auth-form-container">
    <!--<form class="auth-form" action="">-->
    <?php echo form_open('Login_controller/CheckLogin');?>
    <div class="auth-form">
        <div id="auth-form-title">Login to AutoDoc</div>
        <img id="auth-form-logo" src="<?php echo base_url(); ?>images/logo.png"/>
        <div id="auth-form-hint">Use your Email and Password</div>
        <div id="auth-form-error"><?php if(isset($error)){echo $error;} ?></div>
        <div class="auth-form-section">
            <input class="auth-form-input" type="text" name="email" placeholder="Email">
        </div>

        <div class="auth-form-section">
            <input class="auth-form-input" type="password" name="password" placeholder="Password">
        </div>

        <div id="auth-form-question">Not registered? <a href="<?php echo base_url()?>index.php/Register_controller">Register</a></div>

        <input class="auth-form-primary-btn" type="submit" value="Login">
    </div>
    <!--</form>-->
    <?php echo form_close();?>
</div>
 
</body>
</html>

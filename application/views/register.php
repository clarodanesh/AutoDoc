<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Register - AutoDoc</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/autodoc-auth.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    
    <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
</head>
<body>

<div id="auth-form-container">
    <!--<form class="auth-form" action="">-->
    <?php echo form_open('Register_controller/AttemptRegister');?>
    <div class="auth-form">
        <div id="auth-form-title">Register to AutoDoc</div>
        <img id="auth-form-logo" src="<?php echo base_url(); ?>images/logo.png"/>
        <div id="auth-form-hint">Create an account with AutoDoc</div>
        <div id="auth-form-error"><?php if(isset($error)){echo $error;} ?></div>
        <div class="auth-form-section">
            <input class="auth-form-input" type="text" name="email" placeholder="Email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email" required>
        </div>
        
        <div class="auth-form-section">
            <input class="auth-form-input" type="date" name="dob" id="dob" required>
        </div>
        
        <div class="auth-form-section">
            <input class="auth-form-input" type="text" name="firstname" id="firstname" placeholder="Firstname" required>
        </div>
        
        <div class="auth-form-section">
            <input class="auth-form-input" type="text" name="lastname" id="lastname" placeholder="Lastname" required>
        </div>

        <div class="auth-form-section">
            <input class="auth-form-input" type="password" name="password" placeholder="Password" id="password" pattern=".{7,}" title="Enter six or more characters" required>
        </div>

        <div id="auth-form-question">Already registered? <a href="<?php echo base_url()?>index.php/Login_controller">Login</a></div>

        <input class="auth-form-primary-btn" id="register-btn" type="submit" value="Register">
    </div>
    <!--</form>-->
    <?php echo form_close();?>
</div>

<script src="<?php echo base_url(); ?>js/validation.js"></script>
<script src="<?php echo base_url(); ?>js/register.js"></script>
</body>
</html>

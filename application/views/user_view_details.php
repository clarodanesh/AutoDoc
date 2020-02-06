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

<div id="view-appt-main">
    <div id="form-container">
        <!--<form class="auth-form" action="">-->
        <?php $attr = array('id' => 'book-form'); echo form_open('User_controller/EditDetails', $attr);?>
        <div class="user-form" id="login-form">
            <div id="auth-form-title">Your Details</div>
            <div id="auth-form-error"><?php if(isset($error)){echo $error;} ?></div>
            <div class="auth-form-section">
                <!--<input class="auth-form-input" type="text" id="dob-input" placeholder="<?php echo $dob; ?>" required>-->
                <input class="auth-form-input" type="date" name="dob" id="dob" value="<?php echo $dob; ?>" required >
            </div>
            
            <div class="auth-form-section">
                <input class="auth-form-input" type="text" name="firstname" id="firstname" placeholder="<?php echo $firstname; ?>" required>
            </div>
            
            <div class="auth-form-section">
                <input class="auth-form-input" type="text" name="lastname" id="lastname" placeholder="<?php echo $lastname; ?>" required>
            </div>
            
            
            <input class="auth-form-primary-btn" id="save-btn" type="submit" value="Save">
        </div>
        <!--</form>-->
        <?php echo form_close();?>
    </div>
</div>
 
<script src="<?php echo base_url(); ?>js/validation.js"></script>
<script src="<?php echo base_url(); ?>js/user.js"></script>
</body>
</html>

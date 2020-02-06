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
    <div id="view-appt-view">
        <div id="auth-form-title">Your Booking</div>
            <!--<option value="<?php echo $doc->email;?>">Dr. <?php echo $doc->firstname;?> <?php echo $doc->lastname;?></option>-->
        <div class="user-detail">Doc Name</div>
        <div class="user-detail">Date</div>
        <div class="user-detail">Time</div>
        <a href="" class="auth-form-primary-btn" id="cancel">Cancel</a>
    </div>
</div>
 
<script src="<?php echo base_url(); ?>js/validation.js"></script>
<script src="<?php echo base_url(); ?>js/user.js"></script>
</body>
</html>

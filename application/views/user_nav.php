<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/autodoc-user.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    
    <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/admin-panel.js"></script>
</head>
<body>

<div id="user-nav">
    <div id="branding-container">
        <img id="logo-img" src="<?php echo base_url(); ?>images/logo-no-text.png"/>
        <div id="logo-text">AutoDoc</div>
    </div>
    <div id="link-container">
        <a href="<?php echo base_url() . "index.php/User_controller/"  ?>" class="link">Book</a>
        <a href="<?php echo base_url() . "index.php/User_controller/ViewDetails"  ?>" class="link">Details</a>
        <div id="link-seperator">|</div>
        <a href="<?php echo base_url() . "index.php/User_controller/logout"  ?>" class="link">&#x23FB;</a>
    </div>
</div>

</body>
</html>

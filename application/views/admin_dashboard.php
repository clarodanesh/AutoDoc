<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Admin Dashboard - AutoDoc</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/autodoc-admin.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    
    <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/admin-panel.js"></script>
</head>
<body>

<div id='admin-side-panel'>
    <div id='admin-panel-header'>Admin Panel</div>
    <div class='side-panel-link'>View doctors</div>
    <div class='side-panel-link'>View patients</div>
    <div class='side-panel-link'>View requests</div>
    <a href='<?php echo base_url()?>index.php/Admin_controller/logout' id='logout-btn'><div class='side-panel-link'>Log Out</div></a>
</div>

<div id='main-content'>
    <div id='main-header'></div>
</div>

</body>
</html>

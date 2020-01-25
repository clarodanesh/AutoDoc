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

<div id='main-content'>
    <div id='main-header'>Manage Doctors</div>
    <div id='admin-action-container'>
        <a href='#' class='admin-action-btn' id='add-btn'>Add</a>
        <input class='admin-action-search' type="text" placeholder="Search">
    </div>
    <div id='admin-frame'>
        <div class='frame-cards'></div>
        <div class='frame-cards'></div>
        <div class='frame-cards'></div>
        <div class='frame-cards'></div>
        <div class='frame-cards'></div>
        <div class='frame-cards'></div>
        <div class='frame-cards'></div>
        <div class='frame-cards'></div>
        <div class='frame-cards'></div>
        <div class='frame-cards'></div>
        <div class='frame-cards'></div>
        <div class='frame-cards'></div>
        <div class='frame-cards'></div>
        <div class='frame-cards'></div>
        <div class='frame-cards'></div>
        <div class='frame-cards'></div>
    </div>
</div>

</body>
</html>

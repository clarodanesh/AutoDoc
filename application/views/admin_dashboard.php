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
    <div id='main-header'>Dashboard</div>
    <div class='admin-board-container'>
        <?php echo anchor('Admin_controller/ManageDoctors', "<div class='admin-board-header'>Doctors</div><div class='admin-board-content'></div>", 'class="admin-board"');?>
        
        <a href="<?php echo base_url() . "index.php/Admin_controller/ManagePatients"  ?>" class='admin-board right-admin-board'>
            <div class='admin-board-header'>Patients</div>
            <div class='admin-board-content'></div>
        </a>
    </div>
    <a href="<?php echo base_url() . "index.php/Admin_controller/ManageAdmins"  ?>" class='admin-board-container' id='bottom-admin-board-container'>
        <div class='admin-board full-width-board'>
            <div class='admin-board-header'>Appointments</div>
            <div class='admin-board-content'></div>
        </div>
    </a>
</div>

</body>
</html>

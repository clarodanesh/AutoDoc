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
        <a href="<?php echo base_url() . "index.php/Admin_controller/AddDoc" ?>" class='admin-action-btn' id='add-btn'>Add</a>
        <input class='admin-action-search' type="text" placeholder="Search">
    </div>
    <div id='admin-frame'>
        <?php if($docInfo=="empty"){return null;}foreach($docInfo as $doctor):?>
            <div class="frame-cards">
                <div class="frame-card-info-container">
                    <div class="frame-card-cont-text">Dr. <?php echo $doctor->firstname;?> <?php echo $doctor->lastname;?></div>
                    <div class="frame-card-cont-text"><?php echo $doctor->email;?></div>
                </div>
                <div class="frame-card-buttons-container">
                    <a href="<?php echo base_url() . "index.php/Admin_controller/ShowForm/" . $doctor->id; ?>" class="frame-card-button">&#9998</a>
                    <a href="<?php echo base_url() . "index.php/Admin_controller/DeleteDoc/" . $doctor->id; ?>" class="frame-card-button">&#10799</a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>

</body>
</html>

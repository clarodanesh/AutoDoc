<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Login - AutoDoc</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/autodoc-auth.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/autodoc-doc.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    
    <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>js/additional-methods.min.js"></script>
</head>
<body>
 
<div id="doc-title">Your Appointments</div>
<div id="appt-container">
    <div id="appt-holder">
        <div id='admin-frame'>
            <?php if($appts=="empty"){return null;}foreach($appts as $appt):?>
                <div class="frame-cards">
                    <div class="frame-card-info-container">
                        <div class="frame-card-cont-text">Patient: <?php echo $appt->fname;?> <?php echo $appt->lname;?></div>
                        <div class="frame-card-cont-text">Date: <?php echo $appt->date;?></div>
                        <div class="frame-card-cont-text">Time: <?php echo $appt->time;?></div>
                    </div>
                    <div class="frame-card-buttons-container">
                        <a href="<?php echo base_url() . "index.php/Doctor_controller/cancel/" . $appt->apptid; ?>" class="frame-card-button">&#10799</a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>

<div id="footer">
    <div id="logger">Logged in as: <?php echo $docEmail ?></div>
    <a href='<?php echo base_url()?>index.php/Doctor_controller/logout' id="logout">Log out</a>
</div>
 
<script src="<?php echo base_url(); ?>js/validation.js"></script>
<script src="<?php echo base_url(); ?>js/doctor.js"></script>
</body>
</html>

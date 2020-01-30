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

<div class="modal-form-container">
    <?php echo form_open('Admin_controller/AddDoctor');?>
        <div class="admin-modal-form">
            <div class="admin-modal-form-title">Add Doctor</div>
        
            <div class="admin-modal-form-section">
                <input class="admin-modal-form-input" type="text" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email" placeholder="Email" required>
            </div>
            
            <div class="admin-modal-form-section">
                <input class="admin-modal-form-input" type="text" name="firstname" id="firstname" placeholder="Firstname" required>
            </div>
            
            <div class="admin-modal-form-section">
                <input class="admin-modal-form-input" type="text" name="lastname" id="lastname" placeholder="Lastname" required>
            </div>
            
            <div class="modal-form-btn-container">
                <a href="<?php echo base_url() . "index.php/Admin_controller/Cancel"  ?>" class="admin-form-secondary-btn">Cancel</a>
                <input class="admin-form-primary-btn" id="login-btn" type="submit" value="Add">
            </div>
        </div>
    <?php echo form_close();?>
</div>

</body>
</html>

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
    <?php echo form_open('Admin_controller/ChangePassword');?>
        <div class="admin-modal-form">
            <div class="admin-modal-form-title">Change Password</div>
            <div id="admin-form-error"><?php if(isset($error)){echo $error;} ?></div>

            <div class="admin-modal-form-section">
                <input class="admin-modal-form-input" type="password" name="password" placeholder="Password" id="password" pattern=".{7,}" title="Enter six or more characters" required>
            </div>
            
            <div class="modal-form-btn-container">
                <input class="admin-form-primary-btn" id="login-btn" type="submit" value="Change">
            </div>
        </div>
    <?php echo form_close();?>
</div>

</body>
</html>

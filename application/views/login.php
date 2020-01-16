<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login - AutoDoc</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/autodoc-main.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
</head>
<body>

<div id="auth-form-container">
    <form class="auth-form" action="">
        <div id="auth-form-title">Login to AutoDoc</div>
        <div id="auth-form-hint">Use your Email and Password</div>
        <div class="auth-form-section">
            <input class="auth-form-input" type="text" name="email" placeholder="Email">
        </div>

        <div class="auth-form-section">
            <input class="auth-form-input" type="password" name="password" placeholder="Password">
        </div>

        <div id="auth-form-question" style="font-size: 0.8rem;font-family: 'Ubuntu', sans-serif;/*! margin-bottom: 30px; */margin-top: 20px;">Not signed up ? <a href="#">Sign up</a></div>

        <input class="auth-form-primary-btn" type="submit" value="Login">
    </form>
</div>
 
</body>
</html>

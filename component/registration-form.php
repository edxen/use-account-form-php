<?php
include('login-form.php');

$passwordId = 'confirmPassword';
$passwordValue = $confirmPassword;
$passwordLabel = 'Confirm Password';
$passwordPlaceholder = 'Confirm your password';
include('input-password.php');

$textId = 'firstname';
$textValue = $firstname;
$textPlaceholder = 'Enter your first name';
$textLabel = 'First Name';
include('input-text.php');

$textId = 'lastname';
$textValue = $lastname;
$textPlaceholder = 'Enter your last name';
$textLabel = 'Last Name';
include('input-text.php');

<?php

const MINIMUM_NAME_LENGTH 	= 2;
const PASSWORD_TO_BE_MATCHED = "bcit";

$userName = '';
$psw = '';
$gender = '';
$language = '';

$userName 	=  ucfirst(trim($_POST['username']));
$psw 	=  trim($_POST['password']);

if (
    strlen($userName) < MINIMUM_NAME_LENGTH
) {
    die("Username must be 2 characaters or more ");
}

if ($psw != PASSWORD_TO_BE_MATCHED) {
    die("Password does not match. Please try again.");

}
echo "<p>Hello, ".$userName."! You have correctly filled out the form. Congratulations.</p>";

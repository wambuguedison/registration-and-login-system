<?php

function sanitize($dirty) {
    return htmlentities($dirty, ENT_QUOTES, "UTF-8");
}

$invalidUsername = FALSE;
$invalidPassword = FALSE;
$usernameTaken = FALSE;
$emailTaken = FALSE;

function UsernameErr($invalidUsername) {
    if ($invalidUsername) {
        return $_POST['username']." is not a valid account";
    }
}
function PasswordErr($invalidPassword) {
    if ($invalidPassword) {
        return "Password Doesn't Match The Account";
    }
}

function usernameExists($usernameTaken) {
    if ($usernameTaken) {
        return $_POST['username']." is Already Taken";
    }
}
function emailExists($emailTaken) {
    if ($emailTaken) {
        return $_POST['email']." is Already Taken";
    }
}
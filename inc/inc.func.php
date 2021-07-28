<?php

/**
 * Function that checks if the user (administrator) has logged in, if not, it is redirected to the login page notifying the error
 */
function isUserAuthenticated()
{
    if (!isset($_SESSION['user']['username']) || preg_match("/^[0-9]{1,11}$/", $_SESSION['user']['id']) == false) {
        header("Location:  login.php?e=2");
        exit(0);
    }
}

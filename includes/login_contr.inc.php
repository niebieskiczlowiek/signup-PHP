<?php

declare(strict_types=1);

function is_input_empty(string $username, string $password): bool {
    if ( empty($username) || empty($password) ) {
        return true;
    } else {
        return false;
    }
}

function does_username_exist(bool|array $userData): bool {
    if ($userData){
        return True;
    } else {
        return False;
    }
}

function is_password_correct(string $pwd, string $hashedPwd): bool {
    if (password_verify($pwd, $hashedPwd)){
        return True;
    } else {
        return False;
    }
}
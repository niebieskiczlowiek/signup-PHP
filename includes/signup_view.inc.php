<?php

declare(strict_types=1);

function signup_inputs() {
    // <input type="text" name="username" placeholder="Username">
    // <input type="password" name="pwd" placeholder="Password">
    // <input type="text" name="email" placeholder="E-Mail">

    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["signup_error"]["username_taken"])) {
        echo ' <input type="text" name="username" placeholder="Username" value=" ' . $_SESSION["signup_data"]["username"] . '" > ';
    } else {
        echo '<input type="text" name="username" placeholder="Username">';
    }

    echo '<input type="password" name="pwd" placeholder="Password">';

    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["signup_error"]["invalid_email"]) && !isset($_SESSION["signup_error"]["email_used"])) {
        echo ' <input type="text" name="email" placeholder="E-Mail" value=" ' . $_SESSION["signup_data"]["email"] . '" > ';
    } else {
        echo '<input type="text" name="email" placeholder="E-Mail">';
    }

    unset($_SESSION["signup_data"]);
}

function check_signup_errors() {
    if (isset($_SESSION["signup_error"])) {
        $errors = $_SESSION["signup_error"];

        echo "<br>";

        foreach($errors as $error) {
            echo "<p>" . $error . "</p>";
        }

        unset($_SESSION["signup_error"]);
    } else if ( isset($_GET["signup"]) && $_GET["signup"] === "success" ) {
        echo "<br>";
        echo "<p> Signed up successfuly! </p>";
    }
}
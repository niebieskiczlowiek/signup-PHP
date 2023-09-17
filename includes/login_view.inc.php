<?php

declare(strict_types=1);

function check_login_errors() {
    if (isset($_SESSION["login_error"])) {
        $errors = $_SESSION["login_error"];

        echo "<br>";

        foreach($errors as $error){
            echo "<p>" . $error . "</p>";
        }

        unset($_SESSION["login_error"]);
    } else if (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo "<p>Login success!</p>";
    }
}
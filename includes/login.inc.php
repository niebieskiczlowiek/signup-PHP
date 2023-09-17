<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $username = $_POST["username"];
    $password = $_POST["pwd"];

    try {
        require_once 'dbh.inc.php';    
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $password)) {
            $errors["empty_input"] = "Fill in all fields";
        }

        $userData = get_user($pdo, $username);

        if (!does_username_exist($userData)){
            $errors["no_username"] = "This user doesn't exist";
        }
        if (!is_password_correct($password, $userData["pwd"])) {
            $errors["incorrect_password"] = "The password is incorrect";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["login_error"] = $errors;

            header("Location: ../index.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $userData["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $userData["id"];
        $_SESSION["user_username"] = htmlspecialchars($userData["username"]);
        $_SESSION["logged_in"] = true;


        $_SESSION["last_regeneration"] = time();

        header("Location: ../home.php?login=success");

        $pdo = null;
        $stmt = null;

        die();    

    } catch(PDOException $e){
        die("Query failed " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}
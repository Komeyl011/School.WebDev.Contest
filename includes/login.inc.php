<?php
    if (isset($_POST['submit'])) {
        $userName = trim($_POST['uid']);
        $password = $_POST['pwd'];
        $uri = $_SERVER['HTTP_REFERER'];
        $uri = explode('?', $uri);

        include "../classes/Login.php";
        $login = new Login($userName, $password);

        if ($login->emptyInput()) {
            $login->emptyInput();
        } else {
            $login->logUserIn($uri[1]);
        }
    } else {
        header("Location: ../login.php?form=not_set");
    }
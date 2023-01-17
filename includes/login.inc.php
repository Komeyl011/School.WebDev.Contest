<?php
    if (isset($_POST['submit'])) {
        $userName = $_POST['uid'];
        $password = $_POST['pwd'];

        include "../classes/Login.php";
        $login = new Login($userName, $password);

        if ($login->emptyInput()) {
            $login->emptyInput();
        } else {
            $login->logUserIn();
        }
    } else {
        header("Location: ../login.php?form=not_set");
    }
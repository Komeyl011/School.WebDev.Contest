<?php
    if (!isset($_POST['submit'])) {
        header("Location: ../signup.php?form=not_set");
    } else {
        if (!isset($_POST['name']) || !isset($_POST['username']) || !isset($_POST['mail']) || !isset($_POST['pwd']) || !isset($_POST['pwdconfirm'])) {
            header("Location: ../signup.php?inputs=not_set");
        } else {
            include "../classes/Signup.php";
            include "../classes/SignupCheck.php";

            $name = trim($_POST['name']);
            $userName = trim($_POST['username']);
            $mail = trim($_POST['mail']);
            $password = $_POST['pwd'];
            $passwordVerify = $_POST['pwdconfirm'];

            $signUp = new Signup($name, $userName, $mail, $password, $passwordVerify);
            $check = new SignupCheck($name, $userName, $mail, $password, $passwordVerify);

            if ($check->emptyInput()) {
                $check->emptyInput();
            } elseif (!$check->validateUserName()) {
                $check->validateUserName();
            } elseif ($check->pwdSpaceCheck()) {
                $check->pwdSpaceCheck();
            } elseif (!$check->passwordLength()) {
                $check->passwordLength();
            } elseif (!$check->passwordMatch()) {
                $check->passwordMatch();
            } else {
                $signUp->signUserUp();
            }
        }
    }
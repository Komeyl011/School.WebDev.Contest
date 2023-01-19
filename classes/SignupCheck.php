<?php

class SignupCheck extends Signup
{
    // Check for empty inputs
    public function emptyInput() : bool
    {
        if (empty($this->userName) || empty($this->password)|| empty($this->passwordVerify)) {
            $empty = true;
            header("Location: ../signup.php?inputs=empty");
        } else {
            $empty = false;
        }
        return $empty;
    }
    // Check for valid username
    public function validateUserName() : bool
    {
//        $pattern = "/^[a-zA-Z\d]^$/";
        if (!preg_match("/^[a-zA-Z\d.]+$/", $this->userName)) {
            $valid = false;
            header("Location: ../signup.php?userName=invalid");
        } else {
            $valid = true;
        }
        return $valid;
    }

    // Check if there's any spaces in the password
    public function pwdSpaceCheck()
    {
        if (str_contains($this->password, ' ')) {
            $space = true;
            header("Location: ../signup.php?password=invalid");
        } else {
            $space = false;
        }
        return $space;
    }

    // Check for password length
    public function passwordLength() : bool
    {
        if (strlen($this->password) < 6) {
            $length = false;
            header("Location: ../signup.php?password=short");
        } else {
            $length = true;
        }
        return $length;
    }
    // Match password inputs
    public function passwordMatch() : bool
    {
        if ($this->password != $this->passwordVerify) {
            $match = false;
            header("Location: ../signup.php?password=not_match");
        } else {
            $match = true;
        }
        return $match;
    }
}
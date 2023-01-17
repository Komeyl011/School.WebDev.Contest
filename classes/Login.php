<?php

class Login
{
    protected string $userName;
    protected string $password;
    protected string $validatePassword;

    function __construct($userName, $password)
    {
        $this->userName = $userName;
        $this->password = $password;
    }

    // check for empty inputs
    public function emptyInput() : bool
    {
        if (empty($this->userName) || empty($this->password)) {
            $empty = true;
            header("Location: ../login.php?input=empty");
        } else {
            $empty = false;
        }
        return $empty;
    }
    // login function
    public function logUserIn()
    {

        include 'DbConn.php';
        $conn = new DbConn();

        $stmt = $conn->connect()->prepare("SELECT * FROM users WHERE userName=?");
        $stmt->execute([$this->userName]);

        global $uid;
        global $pwd;
        if ($stmt->rowCount() === 0) {
            echo "MySql Error!";
        }

        while ($row = $stmt->fetch()) {
            $uid = $row['userName'];
            $pwd = $row['pwd'];
        }

//        $this->validatePassword = password_verify($this->password, $pwd);

        if (!password_verify($this->password, $pwd)) {
            header("Location: ../login.php?login=wrong_info");
        } else {
            session_start();

            $_SESSION['username'] = $uid;
            header("Location: ../index.php?login=success");
        }
    }
}
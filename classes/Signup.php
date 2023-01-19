<?php

class Signup
{
    protected string $name;
    protected string $userName;
    protected string $mail;
    protected string $password;
    protected string $passwordVerify;
    protected string $passwordHash;

    function __construct($name, $userName, $mail, $password, $passwordVerify) {
        $this->name = $name;
        $this->userName = $userName;
        $this->mail = $mail;
        $this->password = $password;
        $this->passwordVerify = $passwordVerify;
    }

    // hash password
    private function hashPassword() : string
    {
        return $this->passwordHash = password_hash($this->password, PASSWORD_DEFAULT);
    }

    // SignUp function
    public function signUserUp() : void
    {

        include "DbConn.php";
        include "Queries.php";

        $stmt = DbConn::connect()->prepare("INSERT INTO users(`name`, email, userName, pwd) VALUES (?, ?, ?, ?);");
        $params = [$this->name, $this->mail, $this->userName, $this->hashPassword()];
        $stmt->execute($params);

        if ($stmt == 0) {
            echo "Sql Error!";
        } else {
            DbConn::connect()->query("CREATE TABLE `user_$this->userName`(
                `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
                `apartments` LONGTEXT NOT NULL
            );");

            header("Location: ../login.php?signup=success");
        }
    }
}
<?php

class Queries extends DbConn
{
    //select everything query
    public static function selectAll($table): bool|array
    {
        $conn = self::connect();

        $res = $conn->query("SELECT * FROM $table");

        return $res->fetchAll();
    }
    //contact us table insert query
    public static function contactUsInsert($name, $mail, $phone, $callMe): int
    {
        $conn = self::connect();

        $row = [$name, $mail, $phone, $callMe];

        $a = $conn->prepare("INSERT INTO contact_us(name, mail, phone, call_me) VALUES (?, ?, ?, ?)");
        $a->execute($row);

        return $a->rowCount();
    }
}
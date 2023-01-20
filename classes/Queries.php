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

    //select query with condition
    public static function select($table, $condition = null, $fetch = true): bool|array
    {
        global $res;

        $conn = self::connect();

        if ($condition != null) {
            $res = $conn->query("SELECT * FROM $table WHERE $condition");
        } else {
            $res = $conn->query("SELECT * FROM $table");
        }

        if ($fetch) {
            return $res->fetchAll();
        } else {
            return $res->fetch();
        }
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
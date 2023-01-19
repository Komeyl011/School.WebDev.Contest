<?php
    if (isset($_SERVER['HTTP_REFERER'])) {
        session_start();
        session_unset();
    //    session_destroy();
        header("Location: ../index.php?logout=success");
    // $a = $_SERVER['QUERY_STRING'];
    // echo $a;
    } else {
        header("Location: ../index.php");
    }
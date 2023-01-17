<?php
    if (!isset($_POST['submit'])) {
        header("Location: ../index.php");
    } else {
        $name = $_POST['name'];
        $email = $_POST['mail'];
        $phoneNumber = empty($_POST['number']) ? null : $_POST['number'];
        $callMe = isset($_POST['call']) ? 'Y' : 'N';

        require '../classes/DbConn.php';
        require '../classes/Queries.php';

        if (Queries::contactUsInsert($name, $email, $phoneNumber, $callMe) > 0)
        {
            echo '
                <div style="margin: 0 auto; text-align: center">
                    <h1>Your data has been submitted to our contact team!</h1>
                    <a href="../index.php">Click here to go back to the main page!</a>
                </div>
            ';
        } else {
            echo 'SQL error!';
        }
    }
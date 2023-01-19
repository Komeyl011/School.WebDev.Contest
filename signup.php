<?php
include 'templates/header.template.php';
require_once 'classes/DbConn.php';
require_once 'classes/Queries.php';
?>

    <section id="signup-page">
        <div class="form-login form-signup">

            <h3 class="m-3 text-light text-capitalize">login</h3>

            <form action="includes/signup.inc.php" method="POST">
                <label for="name" class="text-capitalize">name</label>
                <input type="text" class="w-80 m-3" id="name" name="name">

                <label for="username" class="text-capitalize">username</label>
                <input type="text" class="w-80 m-3" id="username" name="username">

                <label for="email" class="text-capitalize">e-mail</label>
                <input type="email" class="w-80 m-3" id="email" name="mail">

                <label for="password" class="text-capitalize">password</label>
                <input type="password" class="w-80 m-3" id="password" name="pwd">

                <label for="pwdconfirm" class="text-capitalize">confirm password</label>
                <input type="password" class="w-80 m-3" id="pwdconfirm" name="pwdconfirm">

                <button name="submit" type="submit">Signup</button>
            </form>

        </div>
    </section>

<?php
include 'templates/footer.template.php';
?>
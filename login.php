<?php
    include 'templates/header.template.php';
    require_once 'classes/DbConn.php';
    require_once 'classes/Queries.php';
?>

    <section id="login_page">
        <div class="form-login">

            <h3 class="m-3 text-light text-capitalize">login</h3>

            <form action="includes/login.inc.php" method="post">
                <label for="uid" class="text-capitalize">username / e-mail</label>
                <input type="text" class="w-75 m-3" name="uid">
                <label for="pwd" class="text-capitalize">password</label>
                <input type="password" class="w-75 m-3" name="pwd">
                <button name="submit" type="submit">submit</button>
            </form>

        </div>
    </section>

<?php
    include 'templates/footer.template.php';
?>
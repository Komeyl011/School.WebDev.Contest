<?php
    include 'templates/header.template.php';
    require_once 'classes/DbConn.php';
    require_once 'classes/Queries.php';
?>
    <header>
        <section id="item_header">
            <div class="navigation">
                <a href="index.php"><p>< back</p></a>
            </div>
            <div class="item_title">
                <h3>
                    <?php
                        echo "just test";
                    ?>
                </h3>
            </div>
            <div>
                <p></p>
            </div>
        </section>
    </header>
    <main id="item_main">
        <section class="item_info_page">
            <div class="item_info_wrapper container">
                <?php
                    if (!isset($_SESSION['username']))
                    {
                        echo '
                            <div class="not_logged">
                                <p>Please <a href="login.php">login</a> first to see this page!</p>
                            </div>
                        ';
                    } else {
                ?>

                <?php
                    }
                ?>
            </div>
        </section>
    </main>
<?php
    include 'templates/footer.template.php';
?>
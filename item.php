<?php
    include 'templates/header.template.php';
    require_once 'classes/DbConn.php';
    require_once 'classes/Queries.php';

    // Get item data
    global $item;

    $id = $_GET['id'];
    $id = explode('.', $id);

    $item = Queries::select('items', "id = $id[1]", false);
?>
    <header>
        <section class="container d-flex justify-content-between align-items-center">
            <div class="navigation mt-3">
                <a href="index.php" class="d-block text-black text-decoration-none text-capitalize"><p>< back</p></a>
            </div>
            <div class="item_title">
                <h3><?= $item['title'] ?></h3>
            </div>
            <div>
                <p></p>
            </div>
        </section>
    </header>
    <main id="item_main">
        <section class="item_info_page">
            <div class="container">
                <?php
                    if (!isset($_SESSION['username']))
                    {
                        echo '
                            <div class="text-center">
                                <p>Please <a href="login.php?'. $_SERVER['QUERY_STRING'] .'">login</a> first to see this page!</p>
                            </div>
                        ';
                    } else {
                ?>
                    <script src="js/change.pic.js"></script>
                    <div class="item_info_wrapper">

                        <div class="send_request">

                            <form action="#" class="d-flex flex-column m-2">
                                <div  class="d-flex flex-column mb-3">
                                    <div class="radiobtn d-flex align-items-center">
                                        <input type="radio" name="aa" value="lorem ipsum dolor sit amet." class="m-2" id="option1">
                                        <label for="option1">lorem ipsum dolor sit amet.</label>
                                    </div>
                                    <div class="radiobtn d-flex align-items-center">
                                        <input type="radio" name="aa" value="lorem ipsum dolor sit amet." class="m-2" id="option2">
                                        <label for="option2">lorem ipsum dolor sit amet.</label>
                                    </div>
                                </div>
                                <button class="form_button">submit</button>
                            </form>

                        </div>

                        <div class="description my-0 mx-auto">
                            <div class="about rounded p-3 mb-3 h-75 d-flex justify-content-center align-items-center">
                                <p><?= $item['description'] ?></p>
                            </div>

                            <div class="rooms d-flex">
                                <span class="text-capitalize mx-3 p-2 rounded text-center">bedroom: <?= $item['bedroom'] ?></span>
                                <span class="text-capitalize mx-3 p-2 rounded text-center">bathroom: <?= $item['bathroom'] ?></span>
                                <span class="text-capitalize mx-3 p-2 rounded text-center">garage: <?= $item['garage'] ?></span>
                            </div>
                        </div>

                        <div class="pictures d-flex">

                            <div class="pics-sm-wrapper d-xs-flex">

                                <?php
                                    $selectionID = 0;

                                    foreach (Queries::select("item_no_$id[1]") as $pic)
                                    {
                                        $selectionID++;
                                ?>
                                        <div class="pic-sm mb-3" onclick="change(<?= $selectionID ?>)">
                                            <img src="./images/<?= $pic['image'] ?>" class="selection_pic rounded">
                                        </div>
                                <?php
                                    }
                                ?>
                                <div class="pic-sm mb-3" onclick="change(<?= ++$selectionID ?>)">
                                    <img src="./images/<?= $item['thumbnail'] ?>" alt="about house" class="selection_pic rounded">
                                </div>

                        </div>

                        <div class="pic-main rounded border-secondary">
                            <img src="./images/<?= $item['thumbnail'] ?>" alt="about house" id="main_pic">
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </section>
    </main>
<?php
    include "templates/footer.template.php";
?>
<?php
    require_once 'classes/DbConn.php';
    require_once 'classes/Queries.php';
    session_start();
?>
<!doctype html>
<html lang="en" dir="rtl">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Lato:wght@100;300;400;700;900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="images/logo.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
     <script src="https://kit.fontawesome.com/57a53d4203.js" crossorigin="anonymous"></script>
    <title>Find Home</title>
</head>
<body>
        <!-- START OF WEBSITE'S HEADER -->
        <header>
            <section id="index_header">
                <!-- LOGO IMAGE AND TEXT -->
                <div class="logo_wrapper">

                    <img src="images/logo.png" alt="website logo">

                    <div>
                        <?php
                            global $title;
                            foreach(Queries::select('company_name_fa') as $title) {
                                $title;
                            }
                        ?>
                        <h2 id="logo_name"><?= $title['name'] ?></h2>
                        <p class="logo_txt"><?= $title['description'] ?></p>
                    </div>

                </div>

                <!-- INFO ABOUT WHAT THE WEBSITE IS FOR -->
                <div class="info_wrapper">
                    <?php
                    global $info;

                    foreach (Queries::select('website_info_fa') as $info) {
                        $info;
                    }
                    ?>
                    <h3><?= $info['whatWeDo'] ?? '???? ???? ?????? ?????? ??????????????? ???? ???????? ?????????? ?????? ???? ???????? ????????' ?></h3>
                    <p><?= $info['subtext'] ?? '???????? ?????????? ?????????? ????????????????? ???????? ???????? ?? ???? ?????????? ???? ?????? ?????????? ???? ???????????? ????????.' ?></p>
                </div>

                <!-- SUBSCRIBE BUTTON -->
                <div class="subscribe_wrapper">
                    <?php
                        if (isset($_SESSION['username'])) {
                            echo "<a href='includes/logout.inc.php'>????????</a>";
                        } else {
                            echo "<a href='#'>??????????</a>";
                        }
                    ?>
                </div>
            </section>
        </header>
        <!-- THINGS THAT WEBSITE OFFER -->
        <section class="heading_about container">
            <?php
                global $about;

                foreach (Queries::select('website_about_fa') as $about) {
                    echo '
                        <div class="img_about">
                            <img src="images/'.$about['pic'].'" alt="logo">
                            <p>'.$about['description'].'</p>
                        </div>
                        <!-- BORDER BETWEEN -->
                        <div class="border_about"></div>
                    ';
                }
            ?>
        </section>
        <!-- START OF THE MAIN SECTION OF WEBSITE -->
        <main id="index_main">
            <!-- ITEMS SHOWCASE SECTION START -->
            <section class="items_wrapper container">
                <!-- HEADING ON THE START OF WEBSITE MAIN CONTENT -->
                <div class="heading">
                    <?php
                        $listingHeader = Queries::select('listing_header_fa', '', false);
                    ?>
                    <p><?= $listingHeader['header'] ?></p>
                    <div class="line"></div>
                </div>
                <!-- ITEMS SHOWCASE -->
                <section class="featured_items">

                    <?php
                        foreach (Queries::select('items_fa') as $item) {
                            echo '
                                <div class="item">
                                    <img src="images/'.$item['thumbnail'].'" alt="house" class="item_pic">
                                    <div class="address_price_wrapper">
                                        <p class="address">'.$item['title'].'</p>
                                        <p class="price">'.$item['price'].' ????????</p>
                                    </div>
                                    <div class="info">
                                        <p class="info_number"><i class="fa-solid fa-bed"></i> '.$item['bedroom'].'</p>
                                        <p class="info_number"><i class="fa-solid fa-shower"></i> '.$item['bathroom'].'</p>
                                        <p class="info_number"><i class="fa-solid fa-car"></i> '.$item['garage'].'</p>
                                        <a href="item.php?item='.$item['title'].'&id='.$_SERVER['REQUEST_TIME'].'.'.$item['id'].'" class="info_view">????????????</a>
                                    </div>
                                </div>
                            ';
                        }
                    ?>

                </section>

            </section>
            <!-- CLIENT STORIES SECTION START -->
            <section class="client_story_wrapper">

                <div class="heading">
                    <p>????????????????????? ?????????????? ?? ???????????????????</p>
                    <div class="line"></div>
                </div>

                <div class="client_stories container">
                    <?php
                        foreach (Queries::select('testimonials_fa') as $story)
                        {
                            echo '
                                <div class="client_story">
                                    <p class="story container">'.$story['content'].'</p>
                                    <p class="client_name">'.$story['author'].'</p>
                                </div>
                            ';
                        }
                    ?>
                </div>

                <div class="quotes_icons">
                    <img src="images/quotes.png" alt="quotes icon">
                    <img src="images/quotes.png" alt="quotes icon">
                </div>

            </section>
            <!-- GET IN TOUCH SECTION START -->
            <section class="get_in_touch container">

                <?php
                    global $content, $img;
                    foreach (Queries::select('website_get_in_touch_fa') as $content)
                    {
                        $content;
                    }
                ?>

                <div class="heading">
                    <p><?= $content['heading'] ?></p>
                    <div class="line"></div>
                </div>

                <div class="about">
                    <p><?= $content['about_txt'] ?></p>
                    <div class="button">
                        <a href="#"><?= $content['about_btn'] ?></a>
                    </div>
                </div>

                <div class="images">
                    <?php
                        foreach(Queries::select('get_in_touch_img') as $img)
                        {
                            echo ' 
                                <img src="images/'.$img['pic'].'" alt="">
                            ';
                        }
                    ?>
                </div>

            </section>

        </main>
        <!-- START OF THE FOOTER -->
<?php
    include 'templates/footer.template.php';
?>
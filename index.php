<?php
    require_once 'classes/DbConn.php';
    require_once 'classes/Queries.php';
?>
<!doctype html>
<html lang="en">
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
    <!-- <script src="https://kit.fontawesome.com/57a53d4203.js" crossorigin="anonymous"></script> -->
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
                        <h2 id="logo_name">
                            <?php
                            global $title;
                            foreach(Queries::selectAll('company_name') as $title) {
                                echo $title['name'];
                            }
                            ?>
                        </h2>
                        <p class="logo_txt"><?= $title['description'] ?></p>
                    </div>

                </div>

                <!-- INFO ABOUT WHAT THE WEBSITE IS FOR -->
                <div class="info_wrapper">
                    <?php
                    global $info;

                    foreach (Queries::selectAll('website_info') as $info) {
                        $info;
                    }
                    ?>
                    <h3><?= $info['whatWeDo'] ?? 'Let us help you find the best house in New York for you' ?></h3>
                    <p><?= $info['subtext'] ?? 'Receive our weekly lists of all houses for rent and sale in the area.' ?></p>
                </div>

                <!-- SUBSCRIBE BUTTON -->
                <div class="subscribe_wrapper">
                    <a href="#">subscribe</a>
                </div>
            </section>
        </header>
        <!-- THINGS THAT WEBSITE OFFER -->
        <section class="heading_about container">
            <?php
                global $about;

                foreach (Queries::selectAll('website_about') as $about) {
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
                    <p>Our featured listings in New York</p>
                    <div class="line"></div>
                </div>
                <!-- ITEMS SHOWCASE -->
                <section class="featured_items">

                    <?php
                        foreach (Queries::selectAll('items') as $item) {
                            echo '
                                <div class="item">
                                    <img src="images/'.$item['picture'].'" alt="house" class="item_pic">
                                    <div class="address_price_wrapper">
                                        <p class="address">'.$item['title'].'</p>
                                        <p class="price">$'.$item['price'].'</p>
                                    </div>
                                    <div class="info">
                                        <img src="images/bed.png" alt="bed icon" class="item_property_icons">
                                        <p class="info_number">'.$item['bedroom'].'</p>
                                        <img src="images/shower.png" alt="shower icon" class="item_property_icons">
                                        <p class="info_number">'.$item['bathroom'].'</p>
                                        <img src="images/car.png" alt="car icon" class="item_property_icons">
                                        <p class="info_number">'.$item['garage'].'</p>
                                        <a href="/item.php?item='.$item['title'].'&id='.$_SERVER['REQUEST_TIME'].'.'.$item['id'].'" class="info_view">view</a>
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
                    <p>client stories & testimonials</p>
                    <div class="line"></div>
                </div>

                <div class="client_stories container">
                    <?php
                        foreach (Queries::selectAll('testimonials') as $story)
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
                    foreach (Queries::selectAll('website_get_in_touch') as $content)
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
                        foreach(Queries::selectAll('get_in_touch_img') as $img)
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
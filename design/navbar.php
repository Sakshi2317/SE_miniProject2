<div class="super_container">
    <!-- Header -->
    <header class="header">
        <!-- Top Bar -->
        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <div class="top_bar_contact_item">
                            <div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918577/phone.png" alt=""></div>+91 9421146408
                        </div>
                        <div class="top_bar_contact_item">
                            <div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918597/mail.png" alt=""></div><a href="mailto:sakshi.pawar1710@gmail.com">sakshi.pawar1710@gmail.com/shrutipatil.an@gmail.com</a>
                        </div>
                        <div class="top_bar_content ml-auto">
                            <!-- <div class="top_bar_menu">
                                <ul class="standard_dropdown top_bar_dropdown">
                                    <li> <a>English</a></li>
                                    <li> <a>₹ INR<i class="fas fa-chevron-down"></i></a> </li>
                                </ul>
                            </div> -->
                            <div class="top_bar_user">
                                <div class="user_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg" alt=""></div>
                                <div><a href="./signup.php" class="account">
                                        <?php
                                        if (empty($username)) {
                                            echo "Register";
                                        } else {
                                            $get_username = "SELECT firstname FROM register WHERE email='$username'";
                                            $response = $db->query($get_username);
                                            $name = $response->fetch_assoc();
                                            echo "Hello," . $name['firstname'];
                                        }

                                        ?>
                                    </a></div>
                                <div>
                                    <?php
                                    if (empty($username)) {
                                        echo "<a href='./signin.php'>Login</a>";
                                    } else {
                                        echo "<a href='./php/logout.php'>Logout</a>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Header Main -->
        <div class="header_main sticky-top">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="col-lg-2 col-sm-3 col-3 order-1">
                        <div class="logo_container">
                            <div class="logo mt-4"><a href="./index.php"><img src="./photos/SE2logo.png" height="90px" /></a></div>
                        </div>
                    </div> <!-- Search -->
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" class="header_search_form clearfix"> <input type="search" required="required" class="header_search_input" placeholder="Search for products...">
                                        <!-- <div class="custom_dropdown" style="display: none;">
                                            <div class="custom_dropdown_list"> <span class="custom_dropdown_placeholder clc">All Categories</span> <i class="fas fa-chevron-down"></i>
                                                <ul class="custom_list clc">
                                                    <li><a class="clc" href="#">All Categories</a></li>
                                                    <li><a class="clc" href="#">Computers</a></li>
                                                    <li><a class="clc" href="#">Laptops</a></li>
                                                    <li><a class="clc" href="#">Cameras</a></li>
                                                    <li><a class="clc" href="#">Hardware</a></li>
                                                    <li><a class="clc" href="#">Smartphones</a></li>
                                                </ul>
                                            </div>
                                            <ul class="search_list">
                                                      
                                            </ul>
                                        </div> <button type="submit" class="header_search_button trans_300" value="Submit"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png" alt=""></button> -->
                                    </form>
                                    <div class="list-group search-items">
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <script>
                        $(document).ready(function(){
                         $(".header_search_input").on("input",function(){
                            $(".search-items").css({display:"block"});
                            $(".search-items").html("");
                             var myvar = setTimeout(function(){
                                 var value = $(".header_search_input").val();
                                 $.ajax({
                                     type : "POST",
                                     url : "./php/search.php",
                                     data : {
                                           value : value
                                     },
                                     success : function(response){
                                        $(".search-items").html(response);
                                     } 
                                 });
                             },2000);

                             setTimeout(function(){
                                 clearTimeout(myvar);
                             },2000);
                         });
                        });
                        $(document).ready(function() {
                            $(".header_search_input").on("input",function() {
                                var value = $(this).val();
                                if(value!=""){
                                $(".header_main").removeClass('sticky-top');
                                $(".main_nav").removeClass('sticky-top');
                                $(".main_nav_menu").removeClass('sticky-top');
                                }
                                else{
                                $(".search-items").css({display:"none"});
                                $(".header_main").addClass('sticky-top');
                                $(".main_nav").addClass('sticky-top');
                                $(".main_nav_menu").addClass('sticky-top'); 
                                }
                                                                
                            });
                        });
                        
                    </script>
                    <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                <a href="./wishlist_page.php">
                                    <div class="wishlist_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918681/heart.png" alt=""></div>
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a href="./wishlist_page.php">Wishlist</a></div>
                                        <div class="wishlist_count">
                                            <?php
                                            if (empty($username)) {
                                                echo "0";
                                            } else {
                                                $get_data = "SELECT COUNT(bookid) AS result FROM wishlist WHERE email='$username'";
                                                $response = $db->query($get_data);
                                                if ($response) {
                                                    $data = $response->fetch_assoc();
                                                    echo $data['result'];
                                                } else {
                                                    echo "0";
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </a>
                            </div> <!-- Cart -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <a href="./cart.php">
                                        <div class="cart_icon"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="">
                                            <div class="cart_count"><span class="total_cart">
                                                    <?php
                                                    if (empty($username)) {
                                                        echo "0";
                                                    } else {
                                                        $get_data = "SELECT COUNT(bookid) AS result FROM cart WHERE email='$username'";
                                                        $response = $db->query($get_data);
                                                        if ($response) {
                                                            $data = $response->fetch_assoc();
                                                            echo $data['result'];
                                                        } else {
                                                            echo "0";
                                                        }
                                                    }
                                                    ?>
                                                </span></div>
                                        </div>
                                    </a>
                                    <div class="cart_content mr-2">
                                        <div class="cart_text"><a href="./cart.php">Cart</a></div>
                                        <div class="cart_price">
                                            <?php
                                            if (empty($username)) {
                                                echo "0";
                                            } else {
                                                $get_data = "SELECT SUM(sell_price) AS result FROM cart WHERE email='$username'";
                                                $response = $db->query($get_data);
                                                if ($response) {
                                                    $data = $response->fetch_assoc();
                                                    echo $data['result'];
                                                } else {
                                                    echo "0";
                                                }
                                            }

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Menu -->
        <div class="page_menu">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page_menu_content">
                            <div class="page_menu_search">
                                <form action="#"> <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products..."> </form>
                            </div>
                            <ul class="page_menu_nav">
                                <li class="page_menu_item has-children"> <a href="#">Language<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children"> <a href="#">Currency<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item"> <a href="./index.php">Home<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item"> <a href="./book_contribute.php">Contribute Book<i class="fa fa-angle-down"></i></a>
                                    <!-- <ul class="page_menu_selection">
                                        <li><a href="./book_contribute.php">BOOK</a></li>
                                        <li><a href="./word_powerpoint_contributes.php">PDF/DOCs/WORD/POWER POINT</a></li>
                                    </ul> -->
                                </li>
                                <!-- <li class="page_menu_item has-children"> <a href="#">E-book-downloads</a> -->
                                    <!-- <ul class="page_menu_selection">
                                            <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        </ul> -->
                                <!-- </li> -->
                                <li class="page_menu_item"> <a href="./sell_books.php">Sell Books</a></li>
                                <!-- <li class="page_menu_item"><a href="./articles.php">Articles</a></li> -->
                                <li class="page_menu_item"><a href="./contact.php">Contact</a></li>
                                <li class="page_menu_item"><a href="./php/logout.php">Logout</a></li>
                                <li class="page_menu_item">
                                    <a href="./signin.php">
                                        <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg" alt="" style='height:20px'>
                                        <?php
                                        if (empty($username)) {
                                            echo "Register";
                                        } else {
                                            $get_username = "SELECT firstname FROM register WHERE email='$username'";
                                            $response = $db->query($get_username);
                                            $name = $response->fetch_assoc();
                                            echo "Hello," . $name['firstname'];
                                        }
                                        ?>
                                    </a>
                                </li>
                            </ul>
                            <div class="menu_contact">
                                <div class="menu_contact_item">
                                    <div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>
                                    +38 068 005 3570
                                </div>
                                <div class="menu_contact_item">
                                    <div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
<!-- Main Navigation -->
<nav class="main_nav sticky-top mb-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="main_nav_content d-flex flex-row">
                    <!-- Categories Menu -->
                    <!-- Main Nav Menu -->
                    <div class="main_nav_menu sticky-top">
                        <ul class="standard_dropdown main_nav_dropdown">
                            <li><a href="index.php">Home<i class="fas fa-chevron-down"></i></a></li>
                            <li class="hassubs"> <a href="./book_contribute.php">Contribute Book</a>
                                <!-- <ul>
                                    <li> <a href="./book_contribute.php">Book<i class="fas fa-chevron-down"></i></a> -->
                                        <!-- <ul>
                                                        <li><a href="#">Arts & Music<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Biographies<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Business<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Engineering<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Health & Fitness<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Medical<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Sports<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                    </ul> -->
                                    <!-- </li>
                                    <li><a href="./pdf_contribute.php">PDF<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="./docs_contributes.php">DOCs<i class="fas fa-chevron-down"></i></a></li>
                                    <li><a href="./word_powerpoint_contributes.php">WORD/POWER POINT<i class="fas fa-chevron-down"></i></a></li>
                                </ul> -->
                            </li>
                            <!-- <li class="hassubs"> <a href="#">E-book-Downloads</a> -->
                                <!-- <ul>
                                                <li> <a href="#">Arts & Music<i class="fas fa-chevron-down"></i></a> -->
                                <!-- <ul>
                                                        <li><a href="#">Laptop<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Mobiles<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Ipads<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                    </ul> -->
                                <!-- </li>
                                                <li><a href="#">Biographies<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Business<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Engineering<i class="fas fa-chevron-down"></i></a>
                                                  
                                                </li>
                                                <li><a href="#">Health & Fitness<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Medical<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Sports<i class="fas fa-chevron-down"></i></a></li>
                                            </ul> -->
                            <!-- </li> -->
                            <li><a href="./sell_books.php">Sell Books<i class="fas fa-chevron-down"></i></a></li>
                            <!-- <li><a href="./articles.php">Articles<i class="fas fa-chevron-down"></i></a></li> -->
                            <li class="hassubs"> <a href="#">Pages<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="./order.php">Your Orders<i class="fas fa-chevron-down"></i></a></li>
                                                <!-- <li><a href="./blog.php">Your Blog<i class="fas fa-chevron-down"></i></a></li> -->
                                                <li><a href="./cart.php">Cart<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="./contact.php">Contact<i
                                                            class="fas fa-chevron-down"></i></a></li>
                                            </ul>
                                        </li>

                            <li><a href="contact.php">Contact<i class="fas fa-chevron-down"></i></a></li>
                        </ul>
                    </div> <!-- Menu Trigger -->
                    <div class="menu_trigger_container ml-auto">
                        <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                            <div class="menu_burger">
                                <div class="menu_trigger_text">menu</div>
                                <div class="cat_burger menu_burger_inner">
                                    <span></span><span></span><span></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
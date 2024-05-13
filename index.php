<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Bakery">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bakery</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>



    <!-- Header Section Begin -->
    <header class="header">

        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="#"><img src="img/biglogo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="#">Anasayfa</a></li>
                            <li><a href="#">Sipariş</a></li>
                            <li><a href="#">Sayfalar</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="#">Sipariş Detayı</a></li>
                                    <li><a href="#">Alışveriş Sepeti</a></li>
                                    <li><a href="#">Satın Al</a></li>
                                </ul>
                            </li>
                            <li><a href="./contact.html">İletişim</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div id="shopping-cart-menu">
                    </div>
                    <div class="header__cart">
                        <ul>
                            <li><i class="fa fa-shopping-bag"></i> <span id="counter">0</span></li>
                            <li class="header_auth">
                                <a href="login.php" target="_blank"><i class="fa fa-user"></i> Giriş</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Tüm Kategoriler</span>
                        </div>
                        <ul>
                            <li><a href="#items">Pastalar</a></li>
                            <li><a href="#items">Kurabiyeler ve Kekler</a></li>
                            <li><a href="#items">Çikolata ve Şekerlemeler</a></li>
                            <li><a href="#items">Tatlılar</a></li>
                            <li><a href="#items">Dondurmalar</a></li>
                            <li><a href="#items">Gluten İçermeyen Ürünler</a></li>
                            <li><a href="#items">Vegan Tatlılar</a></li>
                            <li><a href="#items">İçecekler</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    Tüm Kategoriler
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="Bugün ne arzu edersiniz?">
                                <button type="submit" class="site-btn">Ara</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+90 555 555 55</h5>
                                <span>Bize Ulaşın</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>TAZE TATLILAR</span>
                            <h2>GÜNLÜK ÜRETİM</h2>
                            <p>Dakikalar içinde Masanızda</p>
                            <a href="#items" class="primary-btn">Sipariş Ver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-1.jpg">
                            <h5><a href="#">Fırın Ürünleri</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-2.jpg">
                            <h5><a href="#">Tatlılar</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-3.jpg">
                            <h5><a href="#">Çikolata ve Şekerlemeler</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-4.jpg">
                            <h5><a href="#">İçecekler</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-5.jpg">
                            <h5><a href="#">Gluten İçermeyen Ürünler</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad" id="items">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Ürünlerimiz</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Hepsi</li>
                            <li data-filter=".kurabiyeler">Kurabiyeler</li>
                            <li data-filter=".pastalar">Pastalar</li>
                            <li data-filter=".dondurmalar">Dondurmalar</li>
                            <li data-filter=".tatlilar">Tatlılar</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php include 'fetch_products.php'; ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->


    <!-- Footer Section Begin -->
    <br>
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/biglogo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Adres:</li>
                            <li>Telefon: </li>
                            <li>Email:</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Linkler</h6>
                        <ul>
                            <li><a href="#">Sipariş</a></li>
                            <li><a href="#">Sayfalar</a></li>
                            <li><a href="#">İletişim</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>E-posta bültenimize abone olun!</h6>
                        <form action="#">
                            <input type="text" placeholder="Mail adresiniz:">
                            <button type="submit" class="site-btn">Abone Ol</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script> All rights reserved </a>
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>
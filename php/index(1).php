<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>СИРЕНА - Начало</title>
        
        <meta name="description" content="СИРЕНА - Система за Известяване и Ранна Евакуация при Наводнения и Аварии">
        <meta name="author" content="Konstantin Violinov, Константин Виолинов">
        <meta name="area" content="Education, Smart Home, IoT, Internet of Thing, Arduino, Образование, Умен дом, Интернет на нещата, Ардуино, Обучение" />
        <meta name="rating" content="General" />
        <meta name="abstract" content="СИРЕНА - Система за Известяване и Ранна Евакуация при Наводнения и Аварии. Целта на този сайт е да представи работеща платформа за ранно известяване при опасност от наводнения." />
        <meta name="keywords" content="Обучение, Образование, Умен дом, Промишлена автоматизация, Проекти, Проекти с Ардуино, Проекти за умен дом, Проекти за примишлена автоматизация, Проекти за IoT, 
       Education, smart home for beginners, smart home for advanced, Arduino, smart home with arduino, Projects with Arduino, ESP32, LoRa32,
       Making Smart Home, Building Smart Home, Internet of Thing, IoT, Би смарт, B-Smart, Be Smart, B Smart " />
        <meta name="subject" content="СИРЕНА - Система за Известяване и Ранна Евакуация при Наводнения и Аварии, промишлена автоматизация, SIRENA, Internet of Thing, IoT, Projects" />
       	<meta name="robots" content="index, follow" />

        
        
        
        <!-- 
        Multi Profile
        http://www.templatemo.com/preview/templatemo_457_multi_profile
        -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/templatemo-style.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <style>
            .text-uppercase{
               text-align: left;
           }
        </style>

    </head>
    <body class="templatemo-container">
        <!-- header -->
        <div class="header-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-4 site-name-container">
                        <img src="img/logo.png" alt="Site logo" class="site-logo">
                        <h1 class="site-name">СИРЕНА</h1>
                    </div>
                    <div class="mobile-menu-icon">
                        <i class="fa fa-bars"></i>
                    </div>
                    <di0v class="col-lg-9 col-md-8 col-sm-8 templatemo-nav-container">
                        <nav class="templatemo-nav">
                            <ul>
                                <li><a href="index.php" class="active">Начало </a></li>
                                <li><a href="visualization.php">Визуализация</a></li>
                                <li><a href="show-cluster.php">Клъстери</a></li>
                                <li><a href="show-devices.php">Устройства</a></li>
                                <li><a href="zanas.php">За нас</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header -->
        <!-- header image -->
        <div class="header-img"></div>
        <!-- end header image -->
        <!-- Welcome message -->
        <div class="welcome-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="welcome-wrapper">
                            <!-- <h2 class="welcome-title text-uppercase">Welcome</h2> -->
                            <!-- <img src="img/welcome-divider-lines.png" alt="Welcome divider" class="welcome-divider-lines-img"> -->
                            <p class="welcome-description">СИРЕНА - "Система за Известяване и Ранна Евакуация при Наводнения и Аварии"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome message -->
        
        <!-- main content -->
        
        
         <section class="templatemo-container section-shadow-bottom">
            <div class="container">
                
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-7 tm-about-left">
                         <!--
                         <img src="img/f20.jpg" alt="Image" class="img-responsive margin-bottom-30">
                       
                        <h3 class="section-title-2 text-uppercase font-weight-300"><b>Morbi</b> <span class="blue-text">Accumsan</span></h3>
                        -->
                        <p class="justify-text"><b>Наводненията </b>са пряко следствие от валежи с висок  интензитет и значително количество, съчетано с неподходяща инфраструктура за отвеждане на екстремното количество водни маси. През последните години честотата на подобни метеорологични явления се увеличава, както в резултат на настъпващите климатични промени, така и в резултат на човешката дейност (презастрояване, обезлесяване). Щетите от подобни събития се измерват в милиони лева, разрушена инфраструктура, а понякога и в човешки животи.</p>
                        <p class="justify-text margin-bottom-30"><b>Основната цел на проекта </b>е да разработи цялостна платформа за мониторинг на водните нива чрез система от автоматизирани станции за измерване, базирани на инженерната платформа ESP32/LoRa32. За целта ще бъде разработен инженерен прототип на автоматизирана станция, която ще позволява измерване на водните нива чрез 2 различни способа: (1) непрекъснато измерване на водното ниво чрез ултразвук, и (2) измерване за достигане на предварително дефинирани критични нива. Станцията ще подава събраната информация към собствен сървър на платформата, на който данните ще бъдат съхранявани и обработвани, а резултатите ще се достъпни за визуализация за крайните потребители. </p>
                        <!--
                        <a href="#" class="btn-blue-gradient">Prima Liuam</a>
                        -->
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 tm-about-right">
                        <div class="tm-img-container margin-bottom-30">
                            <!--
                            <div class="tm-img-overlay">
                                <p class="img-description">Feufelisda</p>
                                <p class="img-title">Nullam Acurna</p>
                            </div>
                            -->
                            <img src="img/f20.jpg" alt="Image" class="img-responsive">
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <section class="templatemo-container light-gray-bg section-shadow-bottom">
            <div class="container">
                <div class="row section-title-container">
                    <div class="col-lg-12 text-uppercase text-center">
                        <h2 class="section-title">Технологично решение</h2>
                        <div class="section-title-underline-blue"></div>
                        <hr class="section-title-underline">
                        
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 text-center tm-about-container-2">
                        <!--<img src="img/11.png" alt="Image">-->
                        <h3 class="text-uppercase about-h3">Автоматизирана станция</h3>
                        <p class="about-description">Автоматизираната станция, базирана на ESP32/LoRa32, която събира данни от първичните сензори, обработва ги и посредством мрежови протоколи предава данните към сървърната платформа.</p>
                    </div>
                   <div class="col-lg-4 col-md-4 col-sm-4 text-center tm-about-container-2">
                        <img src="img/sirena3.png" alt="Image">
                        <h3 class="text-uppercase about-h3">Мрежови агрегатор</h3>
                        <p class="about-description">Мрежови агрегатор, който служи като своеобразен прокси сървър и концентратор за първичните станции и способства както за разширяване на обхвата на покритие на системата, така и за намаляване на себестойността на автоматизираните станции.</p>
                   </div>
                   <div class="col-lg-4 col-md-4 col-sm-4 text-center tm-about-container-2">
                        <!--<img src="img/13.png" alt="Image">-->
                        <h3 class="text-uppercase about-h3">Сървърна платформа</h3>
                        <p class="about-description">Сървърната платформа за агрегиране и визуализация включва база данни за съхраняване на първичните данни, модул за комуникация с автоматизираните станции, модул за администрация, система за визуализация на данните, и система за известяване при критични събития.</p>
                    </div>
                </div>
            </div>
        </section>

        
        
        <!-- main content -->
        <!-- Who We Are -->
        <section class="templatemo-container">
            <div class="container">
                
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="tm-blocks-container effect1">
                            <div class="tm-block green-bg">
                                <a href="#" class="tm-block-link">Технологии</a>
                            </div>
                            <div class="tm-block">
                                <img src="img/logo3.png" alt="Image" class="img-responsive">
                            </div>
                            <div class="tm-block">
                                <img src="img/logo1.png" alt="Image" class="img-responsive">
                            </div>
                            <div class="tm-block red-bg">
                                <a href="#" class="tm-block-link">Езици</a>
                            </div>
                            <div class="tm-block yellow-bg">
                                <a href="#" class="tm-block-link">Платформи</a>
                            </div>
                            <div class="tm-block">
                                <img src="img/logo2.jpg" alt="Image" class="img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <h3 class="section-title-2 text-uppercase font-weight-300"><b>Техническа</b> <span class="blue-text">Реализация</span></h3>
                        <p class="justify-text">Настоящият проект изисква знания, придобивани в специализираното обучение по информатика и информационни технологии в 11-12 клас, както и задълбочени знания по създаване на уеб страници (html, css), създаване на бази данни (MySQL), проектиране и програмиране на инженерни прототипи (електроника, C++, RTOS), мрежова комуникация (WiFi, GSM, LoRa, TCP/IP), обмен на данни чрез уеб (POST/GET), създаване на backend приложения (php), управление на уеб хостинг (cPanel, File management, phpMyAdmin, MySQLAdmin) и интеграция на външни библиотеки и API интерфейси.  </p>
                        <p class="justify-text">В процеса на създаването на проекта са използвани MS VisualStudio, XAMP, Arduino IDE, както и вградените инструменти на хостинга (cPanel, File management, phpMyAdmin, MySQLAdmin).</p>
                        <p class="justify-text">Основните проблеми, свързани с реализацията на проекта са с нуждата от комплексна интеграция на множество езици и платформи, които са изучавани от автора на проекта изцяло самостоятелно.                         </p>
                        <p class="justify-text">Предизвикателство беше и тестването на прототипа, вкл. и възможностите за различна мрежова комуникация при полеви условия, както и нуждата от интеграция на външни библиотеки за визуализация на данните в уеб платформата.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="blue-divider effect1">
            <div class="dark-blue-bg"></div>
            <div class="blue-divider-bg-graphic"></div>
            <div class="blue-bg"></div>
        </div>
        <section class="templatemo-container blue-bg footer-nav effect1">
            <div class="container">
                <div class="col-lg-2 col-md-2 col-sm-6 footer-block">
                    <h3 class="text-uppercase">Основно меню</h3>
                    <nav class="text-uppercase templatemo-nav-2">
                        <ul>
                            <li><a href="index.php" class="active">Начало</a></li>
                                <li><a href="visualization.php">Визуализация</a></li>
                                <li><a href="show-cluster.php">Клъстери</a></li>
                                <li><a href="show-devices.php">Устройства</a></li>
                                <li><a href="zanas.php">За нас</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 footer-block">
                    <h3 class="text-uppercase">За нас</h3>
                    <p>Настоящият сайт е разработен като част от демонстрационна платформа СИРЕНА - "Система за Известяване и Ранна Евакуация при Наводнения и Аварии"
                        за участие в 21-ва Национална олимпиада по информационни технологии 2023/24
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 footer-block">
                    <h3 class="text-uppercase">Ръководител</h3>
                    <ul>
                        <li><a href="#">Георги Игнатов</a></li>
                        <li><a href="#">старши учител<a></li>
                        <li><a href="#">ПМГ "Васил Друмев"</a></li>
                        <li><a href="#">Велико Търново</a></li>
                        <li><a href="http://www.pmgvt.org" target="_blank">www.pmgvt.org</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 footer-block">
                    <h3 class="text-uppercase">Автор</h3>
                    <ul>
                        <li><a href="#">Константин Виолинов</a></li>
                        <li><a href="#">ПМГ "Васил Друмев"</a></li>
                        <li><a href="#">Велико Търново</a></li>
                        <li><a href="http://www.pmgvt.org" target="_blank">www.pmgvt.org</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- end main content -->
        <footer class="text-center">
            <p class="small copyright-text">Copyright &copy; 2024 Константин Виолинов| Design: Template Mo</p>
        </footer>

        <!-- JS -->
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
        <script type="text/javascript" src="js/responsiveCarousel.min.js"></script>      <!-- Carousel -->
        <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
        <script>

            $(function() {
                $('.crsl-items').carousel({
                    visible: 1,
                    itemMinWidth: 320,
                    itemEqualHeight: 320,
                    itemMargin: 9,
                });
                $(".crsl-nav a[href=#]").on('click', function(e) {
                    e.preventDefault();
                });
            });

        </script>
    </body>
</html>

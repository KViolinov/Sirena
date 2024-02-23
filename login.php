<?php
session_start();
	
	include("connection.php");
	include("functions.php");
	
	/*function containsInvalidCharacters($input) {
    $invalidCharacters = '/[!@#$%^&*()+{}\[\]:;<>,.?\/\\\'"-=|`~]/';
    return preg_match($invalidCharacters, $input);
    }*/
    
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){ //&& !containsInvalidCharacters($user_name) && !containsInvalidCharacters($password)){
			//read from db
			 
			$query = "select * from users where user_name = '$user_name' limit 1";
			
			$result = mysqli_query($con, $query);
			
			if($result){
				if($result && mysqli_num_rows($result) > 0)
					{
						$user_data = mysqli_fetch_assoc($result);
						
						if($user_data['password'] === $password){ //!containsInvalidCharacters($password)){
							
							$_SESSION['user_id'] = $user_data['user_id'];
							$_SESSION['user_name'] = $user_data['user_name'];
							
							$username = $user_data['user_name'];
                            $_SESSION['username'] = $username;
							header("Location: index.php");
							die;
						}
					}
				}
			}
			
			echo "wrong username or password!";
		}
		else {
// 			echo "Please enter some valid information";
		}
		
	
?>




<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	    <link rel="stylesheet" href="css/login.css">
	    <title>Sirena - Login</title>
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
        Visual Admin Template
        https://templatemo.com/tm-455-visual-admin
        -->
	     <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/templatemo-style.css" rel="stylesheet">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	    <!--<link href="css/templatemo-style.css" rel="stylesheet">-->
	    
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	    
	    <style>
	       *{
    margin: 0;
    padding: 0;
}
	        
	        .header-img{
	            
	             display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
    width: 100%;
  
	        }
	        
	.container_1{
	 width: 370px;
    height: 370px;
    display: flex;
    flex-direction: column;
    padding: 0 15px 0 15px;
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    transform: .3s;
      
	}
	
	span{
    color: #fff;
    font-size: small;
    display: flex;
    justify-content: center;
    padding: 10px 0 10px 0;
}

header{
    color: #fff;
    font-size: 30px;
    display: flex;
    justify-content: center;
    padding: 10px 0 10px 0;
}

.input-field .input{
     height: 45px;
    width: 92%;
    border: none;
    border-radius: 30px;
    color: #fff;
    font-size: 15px;
    padding: 0 0 0 45px;
    background: rgba(255, 255, 255, 0.1);
    outline: none;
    
}

.input-field i{
    position: relative;
    top: -33px;
    left: 20px;
    color: #fff;
}



::-webkit-input-placeholder{
    color: #fff;
}

.submit{
    border: none;
    border-radius: 30px;
    font-size: 15px;
    height: 45px;
    width: 92%;
    color: black;
    background: rgba(255, 255, 255, 0.7);
    transition: .3s;
    cursor: pointer;
    
}

.submit:hover{
    box-shadow: 1px 5px 7px 1px rgba(0,0,0, 0.2);
}
.two-col{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    color: #fff;
    font-size: small;
    margin-top: 10px;
}
.one{
    display: flex;
}

label{
    margin-top:10px;
    margin-left:3px;
}

label a{
    text-decoration: none;
    color: #fff;
}

p{
   display: flex;
    flex-direction: row;
    justify-content: space-between;
    color: #fff;
    font-size: small;
    margin-top: 10px;
}

.text{
    font-size: 15px;
}


	    </style>
	    
	</head>
	<body class="templatemo-container">
        <!-- header -->
        <div class="header-bg">
            <div class="container>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-4 site-name-container">
                        <h1 class="site-name">СИРЕНА</h1>
                    </div>
                    <div class="mobile-menu-icon">
                        <i class="fa fa-bars"></i>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-8 templatemo-nav-container">
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
         <!--header image -->
        
        
        <div class="header-img">
            <div class="container_1">
            <div class="top">
                <span>Вход в системата</span>
                <header>Вход в системата</header>
            </div>
			
 <form method ="post" class="templatemo-login-form">
	       
	        
	        	<div class="input-field">
		              	<input id="text" type="text" class="input"  name="user_name" placeholder="Потребителско име" title = "Въведете потребителско име на латински без интервал" required pattern = "(^[a-zA-Z_]{1,30})">
		              	<i class="fa-solid fa-user"></i>
	        	</div>
	        	
	        	
	        	<div class="input-field">
		        		        		
		              	<input id="text" type="password" class="input" name="password" placeholder="Парола" title = "Въведете парола която съдържа малки големи латински букви и цифри от 0 до 9 без специални символи" required pattern = "(^[a-zA-Z0-9]{1,30})">
		              	<i class="fa-solid fa-lock"></i>	
		      	</div>
		          
		          	
		      <div class="input-field">
                <input type="submit" class="submit" value="Вход">
                
            </div>
            
            
             <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="c1" name="cc" >
                    <label for="c1">Запомни ме</label>
                </div>
                <div class="two">
                   <!--
                    <label for="#"><a href="#">Забравена парола</a></label>
                    -->
                </div>

            </div>
            </form>
            <p class="text">Нямате регистрация? <a href="signup.php">Регистрация</a></p>
	        	        
	        	        
	        </div>     	
	          	
	        </form>
		
		
		</div>
		
		
	
        </div>
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
        </div>
        
        
	
	
		
	
		
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
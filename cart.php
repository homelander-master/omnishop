<?php session_start();

require_once "db_connect.php";
require_once "vendor/functions/functions.php";

if ( isset($_GET['delete_id']) && isset($_SESSION['cart_list']) ) {
	foreach ($_SESSION['cart_list'] as $key => $value) {
		if ( $value['id'] == $_GET['delete_id'] ) {
			unset($_SESSION['cart_list'][$key]);
		}		
	}
}

if ( isset($_GET['products_id']) && !empty($_GET['products_id']) ) {

	$current_added_products = get_products_by_id($_GET['products_id']);

	if ( !empty($current_added_products) ) {

        

		if ( !isset($_SESSION['cart_list'])) {
			$_SESSION['cart_list'][] = $current_added_products;
		}


		$products_check = false;

		if ( isset($_SESSION['cart_list']) ) {
			foreach ($_SESSION['cart_list'] as $value) {
				if ( $value['id'] == $current_added_products['id'] ) {
					$products_check = true;
				}
			}
		}


		if ( !$products_check ) {
			$_SESSION['cart_list'][] = $current_added_products;
		}

	} else {
		echo "Ошибка";
	}
	
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css'>
      <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!--  Styles  -->
    <link rel="stylesheet" href="css/mouse.css">
    <link rel="stylesheet" href="css/animated.css">
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
    <header>
        <div class="container-fluid bg-dark header-top d-none d-md-block">
                <div class="container">
                    <div class="row text-light pt-2 pb-2">
                        <div class="col-md-5"><i class="fa fa-envelope" aria-hidden="true"></i>	omniman@gmail.com
                        </div>
                        <div class="col-md-2">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i><a href="cart.php">Корзина</a>  
                        </div>
                    </div>
                </div>
        </div>
            <div class="container-fluid bg-black">
                <nav class="container navbar navbar-expand-lg navbar-dark bg-black">
                    <a class="navbar-brand" href="index.php">#Omnigame</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        </li> <a class="nav-link" href="index.php">Главная страница <span class="sr-only">(current)</span></a>
                            
                        <a class="nav-link" href="search.php">Где нас найти <span class="sr-only">(current)</span></a>
                        <a class="nav-link" href="carousel.html">Супер пупер слайдер <span class="sr-only">(current)</span></a>
                        <?php if(!isset($_SESSION['user'])): ?>
                        <a class="nav-link" href="reg.php">Регистрация <span class="sr-only">(current)</span></a>
                        <a class="nav-link" href="login.php">Авторизация <span class="sr-only">(current)</span></a>
                        <?php else: ?>
                            <?php if($_SESSION['user']['role'] == '1'): ?>
                                <a class="nav-link" href="admin.php">Админ панель <span class="sr-only">(current)</span></a>
                                <?php endif; ?>
                                <a class="nav-link" href="user.php">Заказы <span class="sr-only">(current)</span></a>
                                <a class="nav-link" href="exit.php">Выход <span class="sr-only">(current)</span></a>
                                <?php endif; ?>
                        </li>
                        </ul>
                </nav>	
            </div>
            <div class="container-fluid offer pt-3 pb-3 bg-orange d-none d-md-block">
                    <div class="container">
                        <div class="row">
                                <div class="col-md-4 m-right">
                                    <h4>Бесплатная доставка</h4>
                                    <p>от 8000 рублей</p>
                            </div>
                            <div class="col-md-4 m-right">
                                    <h4>Звоните нам в любое время</h4>
                                <p>+123343545</p>
                        </div>
                        <div class="col-md-4">
                            <h4>Мы находимся</h4>
                            <p>Россия, Омск</p>
                        </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="user">
            <div class="container2">
                <div class="user-item">
                    <div class="user-name">Имя:<b><?= $_SESSION['user']['nick']; ?></b></div>
                    <div class="user-role">Роль:<b><?php if($_SESSION['user']['role'] == 0) {
                            echo "Пользователь";
                        } else {
                            echo "Админ";
                        }; ?></b>
                    </div>
                </div>
                <div class="cart">
                    <div class="order-title active" ><h4 >Корзина</h4> </div>
                    <div class="cart-order">
                    <?php if ( isset($_SESSION['cart_list']) && count($_SESSION['cart_list']) !=0 ) : ?>

                        
                        <?php foreach( $_SESSION['cart_list'] as $products ) : ?>
                        <div class="cart__user-item">
                            <div class="cart-img"><img src="img/<?=$products['path'];?>" alt=""></div>
                            <div class="cart-title"><b><?=$products['title'];?></b></div>
                            <div class="cart-price"><b><?=$products['price'];?>.00 &#8381;</b></div>
                            <div class="cart-delete"><a href="cart.php?delete_id=<?=$products['id'];?>">Убрать товар</a></div>
                        </div>
                        <?php endforeach; ?>
                        <form action="vendor/components/order.php" method="POST">
                        <div class="cart-total">Итого: <div class="cart-total__price"></div>.00 &#8381;</div>
                        <div class="cart-order__link">
                            
                                <input type="text" name="address" placeholder="Адрес доставки">
                                <input type="submit" name="submit" value="Оформить заказ">
                        </div>
                        </form>
                        <?php else : ?>
                            <p>
                                Ваша корзина пуста
                                <div class="link-catalog"> <a href="index.php">На главную</a></div>
                            </p>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </main>
    <script src="js/user.js"></script>
    <script src="js/calcPrice.js"></script>
</body>
</html>
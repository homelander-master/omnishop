<?php session_start();
require_once "db_connect.php";
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    
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
                      
                        <?php if(!isset($_SESSION['user'])): ?>
                        <a class="nav-link" href="reg.php">Регистрация <span class="sr-only">(current)</span></a>
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
                <div class="cart user">
                    <?php 
                        $data = mysqli_query($db, "SELECT * FROM `cart` WHERE `id_user` =" .$_SESSION['user']['id'] );
                        $result = mysqli_fetch_all($data, MYSQLI_ASSOC); ?>
                        <?php foreach($result as $row): ?>
                    <div class="data-order">
                    <div data-order class="order-title active" >
                        <div data-order class="order-title__text">
                            <h4 data-order>Заказ #<?=$row['id'];?></h4> <div data-order class="order-data">от <?=$row['order_data'];?></div> <div data-order class="order-status">
                                    <?php 
                                        if($row['cart_status'] == 10):
                                    ?>
                                    Заказ завершен
                                    <?php endif; ?>
                                    <?php if ($row['cart_status'] == 1): ?>
                                        Заказ отправлен
                                    <?php endif; ?>
                                    <?php if ($row['cart_status'] == 0): ?>
                                            Заказ обрабатывается
                                    <?php endif; ?>
                                    <?php if ($row['cart_status'] == -1): ?>
                                            Заказ отменен
                                    <?php endif; ?>

                            </div> <img data-order src="img/down-arrow.png" alt="">
                                <!-- <div class="cart-total"><h4>Итого: </h4></div> -->
                            </div>
                            <a href="vendor/components/deleteCart.php?delete_id=<?=$row['id'];?>">Удалить из истории</a>
                        </div>
                        
                    <div class="cart-order active">
                        <div class="cart__user-item">
                            <div class="cart-price"><b>Сумма заказа: <?=$row['total_price'];?>.00 &#8381;</b></div>
                            <div class="cart-address"><b>Адрес доставки: <?=$row['address'];?></b></div>
                        </div>
                </div>
                </div>
                    
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>
    <script src="js/user.js"></script>
</body>
</html>
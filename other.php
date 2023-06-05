<?php session_start(); 
include("db_connect.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <!--  Meta  -->
  <meta charset="UTF-8" />
  <title>Omni Shop</title>
  
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<!-- Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
  <!--  Styles  -->
  <link rel="stylesheet" href="css/other.css">
</head>
<body>
  	<div class="container-fluid bg-dark header-top d-none d-md-block">
			<div class="container">
					<div class="row text-light pt-2 pb-2">
						<div class="col-md-5"><i class="fa fa-envelope" aria-hidden="true"></i>	omniman@gmail.com
						</div>
							<div class="col-md-3">
								
						</div>
						
						<div class="col-md-2">
						<i class="fa fa-cart-plus" aria-hidden="true"></i><a class="cart" href="cart.php">Корзина</a>  
						</div>
				</div>
			</div>
	</div>
  <div class="container-fluid bg-black">
		<nav class="container navbar navbar-expand-lg navbar-dark bg-black">
  <a class="navbar-brand" href="#">#Omnigame</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <d<div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        </li> <a class="nav-link" href="index.php">Главная страница <span class="sr-only">(current)</span></a>
                            
                        <a class="nav-link" href="search.php">Где нас найти <span class="sr-only">(current)</span></a>
                      
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
	
	
	
 
    
	
	<!-- -->
	
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
	
	<div class="container-fluid bg-light-gray">
			<div class="container pt-5">
					<div class="row">
						<h3>Лидеры продаж</h3>
				</div>
				<div class="underline"></div>
		</div>
		
		<div class="container mt-5">
			<div class="row">
				<?php 
                    $data = mysqli_query($db, "SELECT * FROM `products` WHERE `type_id` = '3'");
                    $result = mysqli_fetch_all($data, MYSQLI_ASSOC); ?>
                    <?php foreach($result as $row): ?>
				<div class="col-md-3">
					<div class="card">
						<img src="img/<?=$row['path'];?>" alt="card1" class="card-img-top">
						<div class="card-body">
							<h5><?=$row['title'];?></h5>
							<h5><?=$row['price'];?>.00 &#8381;</h5>
							<form action="cart.php">
								<button class="btn btn-danger">
								<input type="hidden" name="products_id" value="<?=$row['id'];?>">
									<!-- <a href="cart.php?products_id=?>"></a> -->
									<i class="fa fa-cart-plus" aria-hidden="true">Add To Cart</i>
								</button>
							</form>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="container pt-5">
					<div class="row">
						<h3>Новинки</h3>
				</div>
				<div class="underline"></div>
		</div>
		<div class="container mt-5">
			<div class="row">
		<?php 
                    $data = mysqli_query($db, "SELECT * FROM `products` ORDER BY `products`.`id` DESC");
                    $result = mysqli_fetch_all($data, MYSQLI_ASSOC); 
                    $count = 3;
                    ?>
                    <?php foreach($result as $row): ?>
				<div class="col-md-3">
						<div class="card">
							<img src="img/<?=$row['path'];?>" alt="card1" class="card-img-top">
							<div class="card-body">
								<h5><?=$row['title'];?></h5>
								<h5><?=$row['price'];?>.00  &#8381;</h5>
								<form action="cart.php">
								<button class="btn btn-danger">
								<input type="hidden" name="products_id" value="<?=$row['id'];?>">
									<!-- <a href="cart.php?products_id=?>"></a> -->
									<i class="fa fa-cart-plus" aria-hidden="true">Add To Cart</i>
								</button>
							</form>
							</div>
					</div>
				</div>
						<?php 
                            if($count <=0) 
                                break; 
                                $count--;
                            ?>
                    	<?php endforeach; ?>
			</div>
		</div>
	</div>
					</div>
	<!-- Footer -->
	<div class="container-fluid bg-black">
			<div class="row">
				<footer>
					Design by: Omniman
				</footer>
		</div>
		
	</div>
	
	</div>
	
  
  <!-- Scripts -->
  <script src="scripts/index.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
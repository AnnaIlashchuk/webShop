<?php
	$d = mysqli_query($induction, "SELECT * FROM `departments`");
?>

<nav class="navbar d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal"><?= $_SESSION['name_shop'] ?></h5>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

	<div class="navbar-expand-lg">
  	<div class="collapse navbar-collapse" id="navbarNavDropdown">
	    <ul class="navbar-nav">

	      <li class="nav-item active">
	        <a class="p-2 nav-link text-dark" href="index.php">Головна</a>
	      </li>

				<?php if (isset($_SESSION['user'])){ ?>
				<li class="nav-item active">
	        <a class="p-2 nav-link text-dark" href="basket.php">Корзина</a>
	      </li>
				<?php } ?>

	      <li class="nav-item dropdown active">
	        <a class="p-2 nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Каталог товарів
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<?php while ($dep = mysqli_fetch_assoc($d)){ ?>
							<a class="dropdown-item text-dark" href="department.php?id=<?= $dep['id'] ?>"><?= $dep['name_depart'] ?></a>
						<?php } ?>
	        </div>
	      </li>

				<?php if(isset($_SESSION['user'])){
					if ($_SESSION['user']['position'] == 'покупець'){?>

					<li class="nav-item dropdown active">
		        <a class="p-2 nav-link dropdown-toggle text-dark btn btn-outline-primary" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <?= $_SESSION['user']['firstName'] . " " . $_SESSION['user']['lastName'] ?>
		        </a>
		        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item text-dark" href="profile.php">Мій профіль</a>
		          <a class="dropdown-item text-dark" href="check.php">Чеки</a>
		          <a class="dropdown-item text-dark" href="discount.php">Знижки</a>
		          <a class="dropdown-item text-dark" href="../vendor/signout.php">Вихід</a>
		        </div>
		      </li>

				<?php } elseif ($_SESSION['user']['position'] == 'адміністратор') { ?>

					<li class="nav-item dropdown active">
		        <a class="p-2 nav-link dropdown-toggle text-dark btn btn-outline-primary" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <?= $_SESSION['user']['firstName'] . " " . $_SESSION['user']['lastName'] ?>
		        </a>
		        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item text-dark" href="profile.php">Мій профіль</a>
		          <a class="dropdown-item text-dark" href="check.php">Чеки</a>
		          <a class="dropdown-item text-dark" href="new_discount.php">Нові знижки</a>
		          <a class="dropdown-item text-dark" href="new_product.php">Нові продукти</a>
		          <a class="dropdown-item text-dark" href="new_account.php">Нові аккаунти</a>
		          <a class="dropdown-item text-dark" href="../vendor/signout.php">Вихід</a>
		        </div>
		      </li>

				<?php } elseif ($_SESSION['user']['position'] == 'кур"єр') { ?>

					<li class="nav-item dropdown active">
		        <a class="p-2 nav-link dropdown-toggle text-dark btn btn-outline-primary" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <?= $_SESSION['user']['firstName'] . " " . $_SESSION['user']['lastName'] ?>
		        </a>
		        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item text-dark" href="profile.php">Мій профіль</a>
		          <a class="dropdown-item text-dark" href="check.php">Доставка</a>
		          <a class="dropdown-item text-dark" href="../vendor/signout.php">Вихід</a>
		        </div>
		      </li>

				<?php }} else { ?>

					<li class="nav-item dropdown active">
		        <a class="p-2 nav-link dropdown-toggle text-dark btn btn-outline-primary" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Мій кабінет
		        </a>
		        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item text-dark" href="auth.php">Авторизація</a>
							<a class="dropdown-item text-dark" href="register.php">Реєстрація</a>
		        </div>
		      </li>

				<?php } ?>

				</ul>
			</div>
	  </div>
	</nav>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

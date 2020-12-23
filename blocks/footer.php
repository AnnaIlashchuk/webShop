<?php
	$d = mysqli_query($induction, "SELECT * FROM `departments`");
?>
<footer class="container pt-4 my-md-5 pt-md-5 border-top">
	<div class="row">
		<div class="col-12 col-md">
			<small class="d-block mb-3 text-muted">
				© 2020
			</small>
		</div>

		<div class="col-6 col-md">
			<h5>
				Каталог товарів
			</h5>

			<ul class="list-unstyled text-small">
				<?php while ($depart = mysqli_fetch_assoc($d)){ ?>
					<li><a class="text-muted" href="department.php?id=<?= $depart['id'] ?>"><?= $depart['name_depart'] ?></a></li>
				<?php } ?>
			</ul>
		</div>

		<div class="col-6 col-md">
			<h5>
				Контакти
			</h5>

			<ul class="list-unstyled text-small">
				<li>Телефон: 066-354-56-69</li>
				<li>Адреса: вул. І. Підкови, 12</li>
				<li>Email: masha.ilaschuk@gmail.com</li>
			</ul>

		</div>
	</div>
</footer>

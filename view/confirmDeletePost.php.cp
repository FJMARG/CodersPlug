<!DOCTYPE html>
<html>
<head>
	<?=!include('head.php.cp') ?>
</head>
<body>

	<?php if (isset($args["msj"])): ?>
	<div>
		<?= $args["msj"];?>
	</div>
	<?php endif ?>

	<div class="container-fluid">
		<div class="row">
			<?=!include('navmini.php.cp')  ?>
			<div class="col-lg-3 col-md-5 d-none d-sm-none d-md-block  navaction">

				<!--/////////////////////////////////PERFIL EN GRANDE//////////////////////////////////-->

				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="navbar-brand" href="/board">
						<img src="/assets/img/title.png" width="150" height="auto" alt="">
					</a>
					<div class="profile ">
						<img class="profileimg" src="<?=$args['usuario']['foto']?>">
						<h3 class="username"><?= $args['usuario']['nombre']?></h3>
						<h4 class="rol"><?= $args['usuario']['rol']?></h4>
						<div>
							<h6 class="option">Skills</h6>

							<h6 class="option">Channels</h6>

							<h6 class="option">Studies</h6>

							<h6 class="option">Interest</h6>
						</div>
					</div>
				</div>

			</div>
			<div class="col-lg-5 col-md-7 col-sm-12" >
				<!--/////////////////////////////////PERFIL EN CHICO//////////////////////////////////-->
				<div class="text-center d-none d-sm-none d-md-block  ">
					<h2 class="blanco "><span class="verde">D</span>elete</h2>
				</div>
				<div class="text-center d-block d-sm-block d-md-none align-self-center profilesmall ">
					<div class="row">
						<div class="col-4">
							<img class="profileimg" style="width: 100%" src="<?= $args['usuario']['foto']?>">
						</div>

						<div class="col-7">
							<h5><?= $args['usuario']['nick']?></h5>
							<div class="text-left">
								<h6 class="Skillsmini">Skills</h6>
								<h6 class="Skillsmini">Channels</h6>
								<h6 class="Skillsmini">Studies</h6>
								<h6 class="Skillsmini">Interest</h6>
							</div>
							<div class="row">
								<div class="col-6">
									<button type="button" class="btn btn-light">+</button>
								</div>
								<div class="col-6">
									<button type="button" class="btn btn-light">MP</button>
								</div>

							</div>

						</div>	
					</div>
				</div>


				<div class="fixed">

					<div class="row post">
						<div class="col-12">
							<div class="form-group">
								<br>
								<?php if ($args["post"]["usuario_id"] == $args["usuario"]["id"]): ?>
								<h5>¿Esta seguro que desea eliminar el post <?= $args['post']['titulo'] ?>?</h5>
								<form action="/deletePost" method="POST">
									<input type="hidden" name="id" value="<?= $args['post']['idpost'] ?>">
									<input type="submit" class="btn btn-warning" value="ELIMINAR">
								</form>
								<a href="/verDetallesPost/<?= $args['post']['idpost'] ?>"><h4>Volver</h4></a>
								<?php else: ?>
									<h5>Usted no puede ver esto.</h5>
								<?php endif ?>
							</div>
						</div> 
					</div>
			</div>
			</div>

			<div class="colizq col-4 d-none d-lg-block">

				<div class="col-12">
					<nav class="navbar navbar-light bg-light justify-content-between">
						<?=! include('busqueda.php.cp'); ?>
						<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<?= !include('navlateral.php.cp') ?>
						</div>

					</nav>
				</div>
				<div></div>

			</div>


		</div>
	</div>



	<?=! include('footer.php.cp'); ?>

</body>
</html>
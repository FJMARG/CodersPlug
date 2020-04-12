<!DOCTYPE html>
<html>
<head>
   <?=!include('head.php.cp'); ?>
</head>
<body>
  <?=!include('navbar.php.cp') ?>
  <div class="container">
        <?php if (isset($args["msj"])): ?>
        <div>
          <?= $args["msj"]->getDisplay()." ".$args["msj"]->getMsj();?>
        </div>
        <?php endif ?>
  	  	<div class="row">
  	  		<div class="col-lg-5 col-sm-12 centro">
  				<section>
  					<img src="assets/img/title.png" class="img-fluid">
  					<article class="text-center"><p class="blanco">Sitio de reunion para programadores, estudiantes , reclutadores y empresas IT</p></article>
  				</section>
  			</div>
  			<div class="col-lg-7 d-none d-lg-block centro ">
  				<img class="img-fluid" src="assets/img/logop1.png">
  			</div>
  	  	</div>
  	
  </div>


<?=!include('footer.php.cp'); ?>

</body>
</html>
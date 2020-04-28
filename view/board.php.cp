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
    			 <div class="col-12">
           <a href="/board"><img class="menuflotante2" src="/assets/img/menu.png"></a>
          </div>
			 </div>
			
  		</div>
  		<div class="col-lg-5 col-md-7 col-sm-12" >
        <!--/////////////////////////////////PERFIL EN CHICO//////////////////////////////////-->
  				<div class="text-center d-none d-sm-none d-md-block  ">
  					<h2 class="blanco "><span class="verde">B</span>oard</h2>
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
				   <form action="/addPost" method="POST">
					  <label for="titulo"><h4>Titulo:</h4></label>
				  	  <input type="text" id="titulo" name="titulo" class="form-control comentarios margin2">
                      <textarea class="form-control comentarios margin2" name="post" placeholder="Escribi tu comentario"></textarea>
                      <input type="submit" class="btn btn-warning" value="POSTEAR">
                   </form>
                  </div>
                </div> 
            </div>
         
         <?php foreach ($args["posts"] as $key ) : ?>
			<div class="post">
            <div class="row">
              <div class="col-2">
                 <img src="<?= $key['foto'] ?>">
              </div>
              <div class="col-10 name" >
                <h3 style="color:#ebe770;"><?= $key["nick"] ?></h3>
                <!-- <p class="blanco">hace </p> -->
              </div>
            </div> <!--ROW-->
            <div class="comentario">
              <h5 class="blanco"><?= $key["titulo"] ?></h5>
              <p><?= $key["texto"] ?></p>
            </div>
            <div class="form-group">
              <a href="/verDetallesPost/<?= $key["idpost"] ?>">Ver detalles</a>
            </div>
          </div>
          <?php endforeach ?>
         </div>
         <div class="d-block d-sm-block d-md-none">
           <a href="/board"><img class="menuflotante" src="/assets/img/menu.png"></a>
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
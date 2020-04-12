<!DOCTYPE html>
<html>
<head>
   <?=!include('head.php.cp') ?>
</head>
<body>
  <?=!include('navbar.php.cp') ?>
    
  <div class="container">
  	  	<div class="row">
  	  		<div class="col-lg-5 col-sm-12 centro">
  				<div class="row">
            <?php if (isset($args["msj"])): ?>
            <div>
              <?= $args["msj"]->getDisplay()." ".$args["msj"]->getMsj();?>
            </div>
            <?php endif ?>
            <div class="col-12 text-center">
              <h2 class="blanco">Forma parte de <span class="verde">Coders</span>Plug</h2>
            </div>
            
            <div class="cards">
              <article class="card-body">
                <form method="post" action="/register" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto">
                        <label class="custom-file-label">Subi tu foto de perfil</label>
                      </div>
                    </div>
                  </div>
                    <!--TIPO DE USUARIO-->
                    <div class="form-group">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="rol">Tipo de usuario</label>
                        </div>
                        <select class="custom-select" id="rol" name="rol">
                          <option selected value="1">Coder</option>
                        </select>
                      </div>
                    </div>                  
                  <div class="form-row">
                    <div class="col form-group ">  
                      <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                    </div> <!-- form-group -->
                    <div class="col form-group">
                      <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido">
                      
                    </div> <!-- form-group -->
                  </div> <!-- form-row -->
                  <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo electronico">
                    
                  </div>
                  <!--Pregunta secreta-->
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Respuesta" id="respuesta" name="respuesta">
                           <select class="custom-select" id="pregunta" name="pregunta">
                              <option selected>Pregunta secreta</option>
                              <option value="Amor platonico">Amor platonico</option>
                              <option value="1ra Mascota de la infancia">1ra Mascota de la infancia</option>
                              <option value="Apellido materno">Apellido materno</option>
                              <option value="Primer empleo">Primer empleo</option>
                              <option value="Nombre de tu primer pareja">Nombre de tu primer pareja</option>
                            </select>
                        </div>

                   <!-- form-group -->
                  <div class="form-group">
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="genero" id="genero" value="M" required>
                      <span class="form-check-label"> Masculino </span>
                    </label>
                    <label class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="genero" id="genero" value="F">
                      <span class="form-check-label"> Femenino</span>
                    </label>
                  </div> <!-- form-group -->
                  <div class="form-group">
                    <input class="form-control" name="password" type="password" placeholder="Contraseña">
                    
                  </div> <!-- form-group -->
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block"> Registrarse  </button>
                  </div> <!-- form-group -->                                                
                </form>
              </article> <!-- card-body -->
            </div> <!-- card -->


    </div> <!-- row -->
  			</div>
  			<div class="col-lg-7 d-none d-lg-block centro ">
  				<img class="img-fluid" src="assets/img/logop1.png">
  			</div>
  	  	</div>
  	
  </div>


<?=!include('footer.php.cp'); ?>

</body>
</html>
<?php
	class RegisterController {
		public static function registrar (){
			$parametros = [];
			
			if (ValidatorController::existeUsuario($_POST["email"])){
				$parametros['msj'] = new ClaseMensaje ('danger',"El usuario ya esta registrado en el sistema.",'Error: ', false);
				View::render("register.php.cp",$parametros);
				return false;
			}

			$user=[
				    "rol" => $_POST["rol"],
				    "nombre" => $_POST["nombre"],
				    "apellido" => $_POST["apellido"],
				    "email" => $_POST["email"],
				    "sexo" => $_POST["genero"],
				    "password" => $_POST["password"],
				    "pregunta" => $_POST["pregunta"],
				    "respuesta"=> $_POST["respuesta"]
		    ];

			if (!UsuarioRepository::agregarUsuario($user)){
				$parametros['msj'] = new ClaseMensaje ('danger',"Ocurrio un error en el registro.",'Error: ', false);
				View::render("register.php.cp",$parametros);
				return false;
			}
			
    		$u = UsuarioRepository::recuperarUsuarioEmail($user['email']);
    		
    		if (!RolRepository::agregarRolUsuario($u['id'],$user['rol'])){
				$parametros['msj'] = new ClaseMensaje ('danger',"Ocurrio un error en el registro. Usuario creado sin rol.",'Error: ', false);
				View::render("register.php.cp",$parametros);
				return false;
    		}

    		if(ValidatorController::subioFoto()){
				$dir = "/assets/img/".$user['email']."/";
    			mkdir($dir);
    			if (FotoController::subirFoto($user['email'],"profile") != "El archivo se subio correctamente."){
    				$parametros['msj'] = new ClaseMensaje ('danger',"Ocurrio un error en el registro. Usuario creado sin rol.",'Error: ', false);
					View::render("register.php.cp",$parametros);
					return false;
    			}
				$archivo = $dir . basename($_FILES["foto"]["name"]);
				$temp = explode(".", $archivo);
				$archivo = $dir."profile.".end($temp);
				$tipoDeArchivo = strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
    			$user["foto"] = $archivo;
			}
    		else{
				$user["foto"] = "/assets/img/profile/default.jpg";
    		}

    		if(!ProfileRepository::agregarPerfilUsuario($u['id'],$user['sexo'], "", "", "", "", $user["foto"], "", "", "", "", "", $user['email'] , "")){
    			$parametros['msj'] = new ClaseMensaje ('danger',"Ocurrio un error en el registro. Usuario creado con rol, sin perfil.",'Error: ', false);
				View::render("register.php.cp",$parametros);
				return false;
    		}

	    	$parametros['msj'] = new ClaseMensaje ('success',"Registro satisfactorio.",'Exito: ', true);;
			View::render("register.php.cp",$parametros);
			return true;
		}
	}
?>
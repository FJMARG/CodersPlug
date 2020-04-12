<?php 
	class SessionController{
		public static function login ($email, $pass){	/* Metodo comparacion de datos */
			$dbuser=UsuarioRepository::recuperarUsuarioEmail($email);
			$parametros=[];
			try {	/* 	Excepcion en caso de que existan datos erroneos */
				if ((empty ($dbuser)) || !(self::verifyPassword ($dbuser,$pass))){
					throw new Exception ('Datos erroneos.',1);
				}
			}
			catch (Exception $e){
				$parametros['msj']= new ClaseMensaje ('danger',$e->getMessage(),'Error: ', false);
				View::render("index.php.cp",$parametros);
				return false;
			}
			$dbuserprofile=PerfilRepository::recuperarPerfilUsuario($dbuser['id']);
			$dbuserrol=RolRepository::recuperarRolUsuario($dbuser['id']);
			$dbuser['foto']=$dbuserprofile['foto'];
			$dbuser['nick']=$dbuserprofile['nick'];
			$dbuser['rol']=$dbuserrol['nombre'];
			self::generateSession($dbuser);
			View::redirect("/board");
			return true;
		}

		private static function generateSession ($dbuser){
			session_start();
			$_SESSION['status']= "connected";
			$dbuser['password']= "";
			$dbuser['pregunta_secreta']= "";
			$dbuser['respuesta_pregunta_secreta']= "";
			$_SESSION['sesion']= $dbuser;
			session_commit();
		}

		private static function verifyPassword ($dbuser, $pass){
			return ($dbuser['password'] == $pass);
		}

		public static function logout (){							/* Funcion para el cierre de sesion */
			session_start();
			session_destroy();
			View::redirect("/index");
		}

		public static function verifySession (){

			$ok=false;
			$respuesta=session_start();
			if (isset ($_SESSION['status'])){
				if ($_SESSION['status'] == 'connected'){
					$ok=true;
				}
			}

			return (($respuesta) && ($ok));
		}

		public static function getLoggedUser(){
			return $_SESSION['sesion'];
		}
	}

?>
<?php 
	class ValidatorController{
		public static function subioFoto(){
			return (file_exists($_FILES['foto']['tmp_name']) || is_uploaded_file($_FILES['foto']['tmp_name']));
		}
		public static function existeUsuario($email){
			$temp = UsuarioRepository::recuperarUsuarioEmail($email);
			return !empty($temp);
		}
	}
?>
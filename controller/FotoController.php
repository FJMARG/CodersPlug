<?php
	class FotoController {
		public static function subirFoto ($email,$tipo){
			if(!file_exists($_FILES['foto']['tmp_name']) || !is_uploaded_file($_FILES['foto']['tmp_name'])){
    			return "No se subio ningun archivo.";
			}

			// Tipo se refiere a si es una foto de perfil, de post u otro.
			$dir = "assets/img/".$email."/";
			$archivo = $dir . basename($_FILES["foto"]["name"]);
			$temp = explode(".", $archivo);
			$archivo = $dir.$tipo.".".end($temp);
			$tipoDeArchivo = strtolower(pathinfo($archivo,PATHINFO_EXTENSION));

			// Verificar si el archivo es una imagen.
			if(!self::esImagen($_FILES["foto"]["tmp_name"]))
				return "El archivo no es una imagen.";
			// Verificar si cumple el tamaño.
			if(!self::cumpleTamano($_FILES["foto"]["size"]))
				return "El archivo es muy grande. Tamaño maximo permitido: 5 MB.";
			if(!self::cumpleFormatos($tipoDeArchivo))
				return "No cumple tipo de archivo permitido. Tipos permitidos: JPG, JPEG, PNG, BMP.";
			if (!self::subirArchivo($_FILES["foto"]["tmp_name"],$archivo))
				return "Ocurrio un error al subir el archivo.";
			return "El archivo se subio correctamente.";
			// Los mensajes se usan para debbugear en caso de que haya ocurrido algun problema.
		}

		private static function subirArchivo($arch, $nombre){
			return move_uploaded_file($arch, $nombre);
		}

		private static function esImagen($file){
			return getimagesize($file);
		}

		private static function cumpleTamano($size){
			return ($size < 5242880);		
		}

		private static function cumpleFormatos($type){
			return ($type == "jpg") || ($type == "jpeg") || ($type == "png") || ($type == "bmp");
		}
		
	}
?>
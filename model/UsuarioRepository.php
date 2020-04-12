<?php 
	class UsuarioRepository{
		public static function agregarUsuario($usuario){
			$db = PDOMaker::getInstance();
			$query = $db-> prepare("INSERT INTO usuario (email, password, nombre, apellido, pregunta_secreta, respuesta_pregunta_secreta) VALUES (:e, :p, :n, :a, :pr, :r)");
			$query->bindParam(":e",$usuario['email'],PDO::PARAM_STR);
			$query->bindParam(":p",$usuario['password'],PDO::PARAM_STR);
			$query->bindParam(":n",$usuario['nombre'],PDO::PARAM_STR);
			$query->bindParam(":a",$usuario['apellido'],PDO::PARAM_STR);
			$query->bindParam(":pr",$usuario['pregunta'],PDO::PARAM_STR);
			$query->bindParam(":r",$usuario['respuesta'],PDO::PARAM_STR);
			return $query->execute();
		}
		public static function recuperarUsuario($id){
			$db = PDOMaker::getInstance();
			$query = $db-> prepare("SELECT * FROM usuario u WHERE id = :id");
			$query->bindParam(":id",$id,PDO::PARAM_INT);
			$query->execute();
			return $query->fetch(PDO::FETCH_ASSOC);
		}
		public static function recuperarUsuarioEmail($email){
			$db = PDOMaker::getInstance();
			$query = $db-> prepare("SELECT * FROM usuario u WHERE email = :e");
			$query->bindParam(":e",$email,PDO::PARAM_STR);
			$query->execute();
			return $query->fetch(PDO::FETCH_ASSOC);
		}
	}
?>
<?php 
	class RolRepository{
		public static function agregarRolUsuario($id,$rol){
			$db = PDOMaker::getInstance();
			$query = $db-> prepare("INSERT INTO usuario_rol (usuario_id, rol_id) VALUES (:uid, :rid)");
			$query->bindParam(":uid",$id,PDO::PARAM_INT);
			$query->bindParam(":rid",$rol,PDO::PARAM_INT);
			return $query->execute();
		}
		public static function recuperarRolUsuario($id){
			$db = PDOMaker::getInstance();
			$query = $db-> prepare("SELECT * FROM usuario_rol ur INNER JOIN rol r ON (ur.rol_id = r.id) WHERE ur.usuario_id = :id");
			$query->bindParam(":id",$id,PDO::PARAM_INT);
			$query->execute();
			return $query->fetch(PDO::FETCH_ASSOC);
		}
	}
?>
<?php 
	class PerfilRepository{
		public static function recuperarPerfilUsuario($id){
			$db = PDOMaker::getInstance();
			$query = $db-> prepare("SELECT * FROM perfil p WHERE usuario_id = :id");
			$query->bindParam(":id",$id,PDO::PARAM_INT);
			$query->execute();
			return $query->fetch(PDO::FETCH_ASSOC);
		}
	}
?>
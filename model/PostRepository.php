<?php 
	class PostRepository{
		public static function recuperarPostsDeUsuarios(){
			$db = PDOMaker::getInstance();
			$query = $db-> prepare("SELECT * FROM post p INNER JOIN usuario u ON (p.usuario_id = u.id) INNER JOIN perfil pe ON (u.id = pe.usuario_id) ORDER BY fecha DESC");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
	}
?>
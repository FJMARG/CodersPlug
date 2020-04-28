<?php 
	class PostRepository{
		public static function recuperarPostsDeUsuarios(){
			$db = PDOMaker::getInstance();
			$query = $db-> prepare("SELECT *, p.id as 'idpost' FROM post p INNER JOIN usuario u ON (p.usuario_id = u.id) INNER JOIN perfil pe ON (u.id = pe.usuario_id) WHERE p.post_id is NULL ORDER BY fecha DESC");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		public static function agregarPost($p){
			$db = PDOMaker::getInstance();
			$query = $db-> prepare("INSERT INTO post (texto, fecha, usuario_id, titulo) VALUES (:t, :f, :u, :tit)");
			$query->bindParam(":t",$p['texto'],PDO::PARAM_STR);
			$query->bindParam(":f",$p['fecha'],PDO::PARAM_STR);
			$query->bindParam(":u",$p['usuario_id'],PDO::PARAM_INT);
			$query->bindParam(":tit",$p['titulo'],PDO::PARAM_STR);
			return $query->execute();
		}
		public static function recuperarPost($id){
			$db = PDOMaker::getInstance();
			$query = $db-> prepare("SELECT *, p.id as 'idpost' FROM post p INNER JOIN usuario u ON (p.usuario_id = u.id) INNER JOIN perfil pe ON (u.id = pe.usuario_id) WHERE p.id = :id AND p.post_id is NULL ORDER BY fecha DESC");
			$query->bindParam(":id",$id,PDO::PARAM_INT);
			$query->execute();
			return $query->fetch(PDO::FETCH_ASSOC);
		}
		public static function recuperarComentariosPost($id){
			$db = PDOMaker::getInstance();
			$query = $db-> prepare("SELECT *, p.id as 'idpost' FROM post p INNER JOIN usuario u ON (p.usuario_id = u.id) INNER JOIN perfil pe ON (u.id = pe.usuario_id) WHERE p.post_id = :id ORDER BY fecha ASC");
			$query->bindParam(":id",$id,PDO::PARAM_INT);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		public static function agregarComentarioPost($c){
			$db = PDOMaker::getInstance();
			$query = $db-> prepare("INSERT INTO post (texto, fecha, usuario_id, titulo, post_id) VALUES (:t, :f, :u, :tit, :pid)");
			$query->bindParam(":t",$c['texto'],PDO::PARAM_STR);
			$query->bindParam(":f",$c['fecha'],PDO::PARAM_STR);
			$query->bindParam(":u",$c['usuario_id'],PDO::PARAM_INT);
			$query->bindParam(":tit",$c['titulo'],PDO::PARAM_STR);
			$query->bindParam(":pid",$c['post_id'],PDO::PARAM_STR);
			return $query->execute();
		}
	}
?>
<?php 
	class PostController{
		public static function show($param){
			$parametros=[];
			$parametros['usuario']=SessionController::getLoggedUser();
			$parametros['post']=PostRepository::recuperarPost($param);
			$parametros['comentarios']=PostRepository::recuperarComentariosPost($param);
			View::render("comments.php.cp",$parametros);
		}
		public static function addComment(){
			$comment = [];
			$loggedUser = SessionController::getLoggedUser();
			$comment['post_id'] = $_POST['idpost'];
			$comment['texto'] = $_POST['comentario'];
			$comment['fecha'] = date("Y-m-d H:i:s");
			$comment['usuario_id'] = $loggedUser['id'];
			$comment['titulo'] = $loggedUser['id'];
			PostRepository::agregarComentarioPost($comment);
			View::redirect("/verDetallesPost/".$_POST['idpost']);
		}
	}
?>
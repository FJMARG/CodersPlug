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
		public static function showDeleteConfirm($id){
			$parametros=[];
			$parametros['usuario']=SessionController::getLoggedUser();
			$parametros['post']=PostRepository::recuperarPost($id);
			View::render("confirmDeletePost.php.cp",$parametros);
		}
		public static function editForm($id){
			$parametros=[];
			$parametros['usuario']=SessionController::getLoggedUser();
			$parametros['post']=PostRepository::recuperarPost($id);
			View::render("editPost.php.cp",$parametros);
		}
		public static function delete(){
			PostRepository::eliminarComentariosPost($_POST['id']);
			PostRepository::eliminarPost($_POST['id']);
			View::redirect("/board");
		}
		public static function edit(){
			$post['id'] = $_POST['id'];
			$post['texto'] = $_POST['texto'];
			$post['fecha'] = date("Y-m-d H:i:s");
			$post['titulo'] = $_POST['titulo'];
			PostRepository::modificarPost($post);
			View::redirect("/verDetallesPost/".$post['id']);
		}
	}
?>
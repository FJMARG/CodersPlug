<?php 
	class BoardController{
		public static function show(){
			$parametros=[];
			$parametros['usuario']=SessionController::getLoggedUser();
			$parametros['posts']=PostRepository::recuperarPostsDeUsuarios();
			View::render("board.php.cp",$parametros);
		}

		public static function addPost(){
			$post=[];
			$loggedUser = SessionController::getLoggedUser();
			$post['titulo']=$_POST['titulo'];
			$post['texto']=$_POST['post'];
			$post['fecha']=date("Y-m-d H:i:s");
			$post['usuario_id']=$loggedUser['id'];
			PostRepository::agregarPost($post);
			View::redirect("/board");
		}
	}
?>
<?php 
	class BoardController{
		public static function show(){
			$parametros=[];
			$parametros['usuario']=SessionController::getLoggedUser();
			$parametros['posts']=PostRepository::recuperarPostsDeUsuarios();
			View::render("board.php.cp",$parametros);
		}
	}
?>
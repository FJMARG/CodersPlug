<?php	
	class View {
		public static function render (){
			$target = func_get_args()[0];
			if (isset(func_get_args()[1]))
				$args = func_get_args()[1];
			include_once("view/".$target);
		}
		public static function redirect ($url){
			header('Location: '.$url);
		}
	}
?>
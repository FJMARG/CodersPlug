<?php
	// Configuraciones

	$viewfunctions = scandir("core/view");
	unset($viewfunctions[0]);
	unset($viewfunctions[1]); 
	foreach ($viewfunctions as $viewfunction) {
		require_once("core/view/".$viewfunction);
	}

	// PDO

	$pdo = scandir("db");
	unset($pdo[0]);
	unset($pdo[1]); 
	foreach ($pdo as $p) {
		require_once("db/".$p);
	}

	// Controladores

	$controllers = scandir("controller");
	unset($controllers[0]); // Quita link simbolico "."
	unset($controllers[1]); // Quita link simbolico ".."
	foreach ($controllers as $controller) {
		require_once("controller/".$controller); // Añade cada archivo del directorio controller.
	}

	// Modelos

	$models = scandir("model");
	unset($models[0]);
	unset($models[1]); 
	foreach ($models as $class) {
		require_once("model/".$class);
	}
?>
<?php 
	require_once("core/cfg.php"); // Archivo de configuracion
	
	//	Rutas
	//  render puede recibir 1 o 2 parametros: el template y un array asociativo de datos, que van a ser los datos que se imprimiran en el template, o solo el template.

	switch ($_SERVER['REQUEST_METHOD']) {
		case 'GET':
				switch ($_SERVER['REQUEST_URI']) {
					case '/index':
						View::render("index.php.cp");
						break;
					case '/preguntas':
						View::render("preguntas.php.cp");
						break;
					case '/contact':
						View::render("contact.php.cp");		
						break;
					case '/register':
						View::render("register.php.cp");		
						break;
					case '/board':
						if (SessionController::verifySession())
							BoardController::show();
						else {
							View::redirect("/index");
						}		
						break;
					case '/logout':
						SessionController::logout();	
						break;
					default:
						View::render("index.php.cp");
						break;
				}
			break;
		case 'POST':
				switch ($_SERVER['REQUEST_URI']) {
					case '/register':
						RegisterController::registrar();
						break;
					case '/login':
						SessionController::login($_POST['email'], $_POST['password']);
						break;
				}
			break;
		case 'PUT':
				// Rutas PUT
			break;
		case 'DELETE':
				// Rutas DELETE
			break;
	}

?>
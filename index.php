<?php 
	require_once("core/cfg.php"); // Archivo de configuracion
	
	//	Rutas
	//  render puede recibir 1 o 2 parametros: el template y un array asociativo de datos, que van a ser los datos que se imprimiran en el template, o solo el template.
	
	$url_data = explode("/",$_SERVER['REQUEST_URI']);
	$URI = "/".$url_data[1];
	if (isset($url_data[2]))
		$param = $url_data[2];

	switch ($_SERVER['REQUEST_METHOD']) {
		case 'GET':
				switch ($URI) {
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
					case '/verDetallesPost':
						if (SessionController::verifySession())
							PostController::show($param);
						else {
							View::redirect("/index");
						}		
						break;
					case '/editPostForm':
						if (SessionController::verifySession())
							PostController::editForm($param);
						else {
							View::redirect("/index");
						}
						break;
					case '/deletePostForm':
						if (SessionController::verifySession())
							PostController::showDeleteConfirm($param);
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
				switch ($URI) {
					case '/register':
						RegisterController::registrar();
						break;
					case '/login':
						SessionController::login($_POST['email'], $_POST['password']);
						break;
					case '/addPost':
						if (SessionController::verifySession())
							BoardController::addPost();
						else {
							View::redirect("/index");
						}		
						break;
					case '/agregarComentario':
						if (SessionController::verifySession())
							PostController::addComment();
						else {
							View::redirect("/index");
						}		
						break;
					case '/editPost':
						if (SessionController::verifySession())
							PostController::edit();
						else {
							View::redirect("/index");
						}		
						break;
					case '/deletePost':
						if (SessionController::verifySession())
							PostController::delete();
						else {
							View::redirect("/index");
						}		
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
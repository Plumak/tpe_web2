<?php
require_once('controllers/controller.php');
require_once('controllers/controller_login.php');
require_once('controllers/controller_abm.php');
require_once('middlewares/session.middleware.php');
require_once('middlewares/verify.middleware.php');
require_once('response.php');


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$res = new Response();

$action = $_GET["action"];
if (!empty($_GET["action"])) {
	$action = $_GET["action"];
} else {
	$action = "jugadores";
}
$params = explode('/', $action);
switch ($params[0]) {
	case "jugadores":
		sessionAuthMiddleware($res);
		if (empty($params[1])) {
			$controller = new jugadoresController($res);
			$controller->mostrarJugadores();
		} else {
			$controller = new jugadoresController($res);
			$controller->mostrarJugador($params[1]);
		}
		break;
	case "clubes":
		sessionAuthMiddleware($res);
		if (empty($params[1])) {
			$controller = new jugadoresController($res);
			$controller->mostrarClubes();
		} else {
			$controller = new jugadoresController($res);
			$controller->mostrarClub($params[1]);
		}
		break;
	case "login":
		$controller = new loginController();
		$controller->mostrarLogin();
		break;
	case "logout":
		$controller = new loginController();
		$controller->logout();
		break;
	case "auth":
		$controller = new loginController();
		$controller->autenticarUsuario();
		break;
	case "eliminarjugador":
		sessionAuthMiddleware($res);
		verifyAuthMiddleware($res);
		$id = $params[1];
		$controller = new abmController($res);
		$controller->eliminarJugador($id);
		break;
	case "agregarjugador":
		sessionAuthMiddleware($res);
		verifyAuthMiddleware($res);
		$controller = new abmController($res);
		$controller->agregarJugador();
		break;
	case "editarjugador":
		sessionAuthMiddleware($res);
		verifyAuthMiddleware($res);
		$controller = new abmController($res);
		$controller->editarJugador();
		break;
	case "eliminarclub":
		sessionAuthMiddleware($res);
		verifyAuthMiddleware($res);
		$id = $params[1];
		$controller = new abmController($res);
		$controller->eliminarClub($id);
		break;
	case "agregarclub":
		sessionAuthMiddleware($res);
		verifyAuthMiddleware($res);
		$controller = new abmController($res);
		$controller->agregarClub();
		break;
	case "editarclub":
		sessionAuthMiddleware($res);
		verifyAuthMiddleware($res);
		$controller = new abmController($res);
		$controller->editarClub();
		break;
	default:
		$controller = new jugadoresController($res);
		$controller->mostrarJugadores();
		break;
}

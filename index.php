<?php 

require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$sql = new System\DB\Sql();

	$results = $sql->select("SELECT * FROM TB_USERS");
	echo json_encode($results);
});

$app->run();

 ?>
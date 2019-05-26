<?php 

require_once("vendor/autoload.php");
use \Slim\Slim;
use \System\Page;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
	$page = new Page(["data" => ["title" => "Home"]]);
	$page->SetTpl("index", ["pageName" => "Homepage"]);
});

$app->run();

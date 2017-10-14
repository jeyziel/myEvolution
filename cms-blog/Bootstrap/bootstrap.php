<?php 

use App\App;
use Illuminate\Database\Capsule\Manager as Capsule;
use Respect\Validation\Validator as v;

$app = new App;
$container = $app->getContainer();
$capsule = new Capsule;
$capsule->addConnection([
	'driver' => 'mysql',
	'host' => 'localhost',
	'database' => 'cms_blog',
	'username' => 'root',
	'password' => 'root',
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix' => ''
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
//custom validations
v::with('App\\Validation\\Rules\\');
require __DIR__ . '/../App/middleware.php';
require __DIR__.'/../App/routes.php';

$app->run();
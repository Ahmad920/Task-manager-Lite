<?php
use \app\core\Route;
use \app\DB\DBConnection;
use \app\DB\QueryBuilder;
use \app\App;
use \app\core\Request;
use \app\controllers\TaskController;
use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;

class Task
{
    public $id;
    public $description;
    public $completed;
}
require 'vendor/autoload.php';


App::set('config',require 'config.php');

$log = new Logger('PHP_BASICS');
$log->pushHandler(new StreamHandler('queries.log',Logger::INFO));

$pdo = DBConnection::make(App::get('config')['database']);
// print_r(App::get('config')['database']);exit;
QueryBuilder::make($pdo,$log);

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';

// $routes = [
//     '' => 'app/controllers/index.php',
//     'about' => 'app/controllers/about.php'
// ];




Route::make()
    ->get('', [TaskController::class,'index'])
    ->get('about', 'app/controllers/about.php')
    ->post('task/create', [TaskController::class,'create'])
    ->get('task/delete', [TaskController::class,'delete'])
    ->get('task/update', [TaskController::class,'update'])
    ->resolve(Request::uri(), Request::method());

// $routes= Route::make([
//     '' => 'app/controllers/index.php',
//     'about' => 'app/controllers/about.php'
// ]);
// print_r($routes);
// Route::resolve($uri,$routes)

// if(array_key_exists($uri,$routes)){
//     require $routes[$uri];
// }else {
//     throw new Exception('Page not found');
// }
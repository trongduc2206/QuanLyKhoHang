<?php
require_once '../core/Application.php';
require_once '../controllers/SiteController.php';
require_once '../controllers/AuthController.php';
require_once '../controllers/DataController.php';

require_once '../models/User.php';

$config = [
    'userClass' => User::class,
    'db' => [
        'dsn' => 'mysql:host=localhost;port=3306;dbname=quan_ly_hang_hoa',
        'user' => 'root',
        'password' => 'your_password'    
    ]
];

$app = new Application($config);

$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/import', [DataController::class,'getImportGood']);
$app->router->post('/import', [DataController::class,'getImportGood']);
$app->router->put('/import', [DataController::class,'getImportGood']);

$app->router->get('/partner',[DataController::class,'getPartner']);
$app->router->post('/partner',[DataController::class, 'getPartner']);

$app->router->get('/export',  [DataController::class,'getAllGood']);
$app->router->post('/export',  [DataController::class,'getAllGood']);

$app->router->post('/', array(new SiteController(), 'handleHome') );

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login',[AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/logout', [AuthController::class, 'logout']);


$app->run();

?>
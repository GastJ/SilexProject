<?php

// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

const DB_HOST = 'localhost';
const DB_DATABASE = 'parameter';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

use Silex\Application;
use Silex\Provider\TwigServiceProvider as Twig;
use Symfony\Component\HttpFoundation\Request; 
use Silex\Provider\SessionServiceProvider as Session;

$app = new Silex\Application(); // use application Silex
$twig = new Twig();
$app['debug'] = true;

// database
$app['database.config'] = [
        'dsn'      => 'mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE,
        'username' => 'root',
        'password' => '',
        'options'  => [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // flux en utf8
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // mysql erreurs remontées sous forme d'exception
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // tous les fetch en objets
        ]
  
];

$app['pdo'] = function( $app ){    
    
    $options = $app['database.config'];
  
    return new \PDO($options['dsn'], $options['username'], $options['password'], $options['options']);

}; 

// loader de twig
$app->register(new Twig, [
  'twig.path' => __DIR__ . '/../views',
]);
$app->register(new Session());


$app->get('/', function() use ($app) {

   // récupérer en base de données la configuration enregistrée

    return $app['twig']->render('front/form.twig', ['configuration' => '']);
});

$app->post('/create', function(Request $request) use ($app) {

$request->request->get('param1');
    var_dump($request->request->get('param1'));

   var_dump($app['pdo']);

   // $app->redirect('/');  // redirection vers la page d'accueil

});

$app->run();
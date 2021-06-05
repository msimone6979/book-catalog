<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath("/public");

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
  
});

$app->get('/hello/{name}', function (Request $request, Response $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name ");
    return $response;
  
});


$app->get('/test', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Test !!!");
    return $response;
   /* $data = array('name' => 'Rob', 'age' => 40);
    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
          ->withHeader('Content-Type', 'application/json')
          ->withStatus(201);
          */
});


$app->run();
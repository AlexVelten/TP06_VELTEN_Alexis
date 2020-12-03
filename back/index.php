<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Container\ContainerInterface;
use Slim\Factory\AppFactory;
use App\Controllers\CustomerController;
use App\Middlewares\CorsMiddleware;
use App\Middlewares\JwtMiddleware;
use Tuupola\Middleware\JwtAuthentication;

require __DIR__ . '/vendor/autoload.php';

const JWT_TOKEN = "test123";

$app = AppFactory::create();

$app->options('/{routes:.*}', function (Request $request, Response $response) {
  return $response;
});

$app->add(new CorsMiddleware);

$jwt = new Tuupola\Middleware\JwtAuthentication([
  "path" => "/api",
  "secure" => false,
  "secret" => JWT_TOKEN,
  "passthrough" => ["/login"],
  "attribute" => "decoded_token_data",
  "algorithm" => ["HS256"],
  "error" => function($response, $arguments) {
    $data = array('ERREUR' => 'ERREUR', 'ERREUR' => 'AUTO');
    return $response->withHeader("Content-Type", "application/json")->getBody()->write(json_encode($data));
  }
]);

$app->add($jwt);

$app->post('/addCustomer', 'App\Controllers\CustomerController:addCustomer');
$app->get('/getCustomer/{id}', 'App\Controllers\CustomerController:getCustomer');
$app->post('/login', 'App\Controllers\CustomerController:login');

$app->run();
?>

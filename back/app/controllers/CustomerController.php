<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Firebase\JWT\JWT;

const JWT_SECRET = "test123";

class CustomerController
{
  public function addCustomer($request, $response, $args) {
    $parsedBody = $request->getParsedBody();
    $response->getBody()->write(json_encode(["success" => true, "Client" => $parsedBody]));
    /*
      Création d'un client dans le DB
      ...
      ...
    */
    return $response;
  }

  public function getCustomer($request, $response, array $args){
    $id = $args['id'];
    $response->getBody()->write("Récupération du client $id");
    /*
      Récupération du client dans la DB
      ...
      ...
    */
    return $response;
  }

  public function login($request, $response, $args) {
    $parsedBody = $request->getParsedBody();
    $response->getBody()->write(json_encode(["success" => true, "Client" => $parsedBody]));
    $login = $parsedBody["login"];
    $password = $parsedBody["password"];
    $issuedAt = time();

    $payload = [
      "customer" => [
        "login" => $login,
        "password" => $password
      ],
      "iat" => $issuedAt,
      "exp" => $issuedAt + 60
    ];

    $token_jwt = JWT::encode($payload, JWT_SECRET, "HS256");
    $response = $response->withHeader("Athorization", $token_jwt);
    /*
      Connexion de l'utilisateur à la DB
      ...
      ...
    */
    return $response;
  }
}
?>

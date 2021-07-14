<?php

use entities\CasaEditrice;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Exception\HttpNotFoundException;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../Repository/VolumeRepository.php';
require __DIR__ . '/../Repository/UtenteRepository.php';
require __DIR__ . '/../Repository/CasaEditriceRepository.php';
require __DIR__ . '/../Repository/AutoreRepository.php';

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

/***
 * VOLUME
 */
$app->get('/volume/list', function (Request $request, Response $response, $args) {

    $volumeRepository = new VolumeRepository();
    $volumi = $volumeRepository->getList();

    $serializer = JMS\Serializer\SerializerBuilder::create()->build();
    $payload = $serializer->serialize($volumi, 'json');

    $response->getBody()->write($payload, JSON_PRETTY_PRINT);
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
});

$app->get('/volume/{id}', function (Request $request, Response $response, $args) {

    $id = $args['id'];

    $volumeRepository = new VolumeRepository();
    $volumi = $volumeRepository->findById($id);

    if ($volumi) {
        $serializer = JMS\Serializer\SerializerBuilder::create()->build();
        $payload = $serializer->serialize($volumi, 'json');

        $response->getBody()->write($payload, JSON_PRETTY_PRINT);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    } else {
        $response->getBody()->write("{'error':'Nessun volume trovato per l'id specificato'}");
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(404);
    }
});
$app->addBodyParsingMiddleware();
$app->put('/volume/{id}', function (Request $request, Response $response, $args) {

    try {
        $id = $args['id'];

        $request_data = $request->getParsedBody();
        $titolo = $request_data['titolo'];
        $descrizione = $request_data['descrizione'];
        $genere = $request_data['genere'];
        $anno = $request_data['anno'];
        $pagine = $request_data['pagine'];
        $lingua = $request_data['lingua'];
        $prezzo = $request_data['prezzo'];
        $idCasaEditrice = $request_data['idCasaEditrice'];
        $idAutore = $request_data['idAutore'];
        $letto = $request_data['letto'];
        $formatoCartaceo = $request_data['formatoCartaceo'];
        $formatoEbook = $request_data['formatoEbook'];

        $volumeRepository = new VolumeRepository();
        $volume = $volumeRepository->findById($id);

        $autoreRepository = new AutoreRepository();
        $autore = $autoreRepository->findById($idAutore);

        $casaEditriceRepository = new CasaEditriceRepository();
        $casaEditrice = $casaEditriceRepository->findById($idCasaEditrice);

        $volume->setTitolo($titolo);
        $volume->setDescrizione($descrizione);
        $volume->setGenere($genere);
        $volume->setAnno($anno);
        $volume->setPagine($pagine);
        $volume->setLingua($lingua);
        $volume->setPrezzo($prezzo);
        $volume->setCasaEditrice($casaEditrice);
        $volume->setAutore($autore);
        $volume->setLetto($letto);
        $volume->setFormatoCartaceo($formatoCartaceo);
        $volume->setFormatoEbook($formatoEbook);

        $volumeRepository->update($volume);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    } catch (Exception $exception) {
        $response = (new Response())->withStatus(404);
        $response->getBody()->write('Errore');

        return $response;
    }
});

$app->delete('/volume/{id}', function (Request $request, Response $response, $args) {

    $id = $args['id'];

    $volumeRepository = new VolumeRepository();
    $volume = $volumeRepository->findById($id);

    if ($volume) {
        $volumeRepository->delete($volume);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    } else {
        $response->getBody()->write('{"error":"Nessun volume trovato per l\'id specificato"}');
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(404);
    }
});

/***
 * UTENTE
 */
$app->get('/utente/list', function (Request $request, Response $response, $args) {

    $utenteRepository = new UtenteRepository();
    $utenti = $utenteRepository->getList();

    $payload = json_encode($utenti);
    $response->getBody()->write($payload, JSON_PRETTY_PRINT);
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
});

/***
 * CASA-EDITRICE
 */
$app->get('/casa-editrice/list', function (Request $request, Response $response, $args) {

    $casaEditriceRepository = new CasaEditriceRepository();
    $casaEditrice = $casaEditriceRepository->getList();

    $payload = json_encode($casaEditrice);
    $response->getBody()->write($payload, JSON_PRETTY_PRINT);
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
});

/***
 * AUTORE
 */
$app->get('/autore/list', function (Request $request, Response $response, $args) {

    $autoreRepository = new AutoreRepository();
    $casaEditrice = $autoreRepository->getList();

    $payload = json_encode($casaEditrice);
    $response->getBody()->write($payload, JSON_PRETTY_PRINT);
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
});


$app->run();

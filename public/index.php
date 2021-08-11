<?php

use entities\CasaEditrice;
use entities\Volume;
use entities\Autore;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

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
});

/***
 * VOLUME
 */
$app->get('/volume/list[/{orderFiel}[/{sort}]]', function (Request $request, Response $response, $args) {

    $sort = ($args && $args['sort']) ? $args['sort'] : null;
    $orderFiel = ($args && $args['orderFiel']) ? $args['orderFiel'] : null;

    $volumeRepository = new VolumeRepository();
    $volumi = $volumeRepository->getList($sort, $orderFiel);

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
        $immagine = $request_data['immagine'];
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
        $volume->setImmagine($immagine);
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

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(500);
    }
});

$app->addBodyParsingMiddleware();
$app->post('/volume', function (Request $request, Response $response) {

    try {

        $request_data = $request->getParsedBody();

        $titolo = $request_data['titolo'];
        $descrizione = $request_data['descrizione'];
        $genere = $request_data['genere'];
        $anno = $request_data['anno'];
        $pagine = $request_data['pagine'];
        $lingua = $request_data['lingua'];
        $prezzo = $request_data['prezzo'];
        $immagine = $request_data['immagine'];
        $idCasaEditrice = $request_data['idCasaEditrice'];
        $idAutore = $request_data['idAutore'];
        $letto = $request_data['letto'];
        $formatoCartaceo = $request_data['formatoCartaceo'];
        $formatoEbook = $request_data['formatoEbook'];


        $autoreRepository = new AutoreRepository();
        $autore = $autoreRepository->findById($idAutore);

        $casaEditriceRepository = new CasaEditriceRepository();
        $casaEditrice = $casaEditriceRepository->findById($idCasaEditrice);

        $volumeRepository = new VolumeRepository();

        $volume = new Volume();
        $volume->setTitolo($titolo);
        $volume->setDescrizione($descrizione);
        $volume->setGenere($genere);
        $volume->setAnno($anno);
        $volume->setPagine($pagine);
        $volume->setLingua($lingua);
        $volume->setPrezzo($prezzo);
        $volume->setImmagine($immagine);
        $volume->setCasaEditrice($casaEditrice);
        $volume->setAutore($autore);
        $volume->setLetto($letto);
        $volume->setFormatoCartaceo($formatoCartaceo);
        $volume->setFormatoEbook($formatoEbook);

        $volumeRepository->save($volume);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    } catch (Exception $exception) {
        $response->getBody()->write($exception->getMessage());
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(500);
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
$app->get('/casa-editrice/list[/{orderFiel}[/{sort}]]', function (Request $request, Response $response, $args) {

    $sort = ($args && $args['sort']) ? $args['sort'] : null;
    $orderFiel = ($args && $args['orderFiel']) ? $args['orderFiel'] : null;

    $params = $request->getQueryParams();

    $denominazione = (isset($params['denominazione'])) ? $params['denominazione'] : null;
    $nazione = (isset($params['nazione'])) ? $params['nazione'] : null;

    $casaEditriceRepository = new CasaEditriceRepository();
    $casaEditrice = $casaEditriceRepository->getList($sort, $orderFiel, $denominazione, $nazione);

    $payload = json_encode($casaEditrice);
    $response->getBody()->write($payload, JSON_PRETTY_PRINT);
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
});

$app->get('/casa-editrice/{id}', function (Request $request, Response $response, $args) {

    $id = $args['id'];

    $casaEditriceRepository = new CasaEditriceRepository();
    $casaEditrice = $casaEditriceRepository->findById($id);

    if ($casaEditrice) {
        $serializer = JMS\Serializer\SerializerBuilder::create()->build();
        $payload = $serializer->serialize($casaEditrice, 'json');

        $response->getBody()->write($payload, JSON_PRETTY_PRINT);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    } else {
        $response->getBody()->write("{'error':'Nessuna casa editrice trovata per l'id specificato'}");
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(404);
    }
});

$app->addBodyParsingMiddleware();
$app->put('/casa-editrice/{id}', function (Request $request, Response $response, $args) {

    try {
        $id = $args['id'];

        $request_data = $request->getParsedBody();
        $denominazione = $request_data['denominazione'];
        $nazione = $request_data['nazione'];
        $url = $request_data['url'];


        $casaEditriceRepository = new CasaEditriceRepository();
        $casaEditrice = $casaEditriceRepository->findById($id);

        $casaEditrice->setDenominazione($denominazione);
        $casaEditrice->setNazione($nazione);
        $casaEditrice->setUrl($url);

        $casaEditriceRepository->update($casaEditrice);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    } catch (Exception $exception) {

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(500);
    }
});

$app->addBodyParsingMiddleware();
$app->post('/casa-editrice', function (Request $request, Response $response) {

    try {

        $request_data = $request->getParsedBody();
        $denominazione = $request_data['denominazione'];
        $nazione = $request_data['nazione'];
        $url = $request_data['url'];

        $casaEditrice = new CasaEditrice();
        $casaEditrice->setDenominazione($denominazione);
        $casaEditrice->setNazione($nazione);
        $casaEditrice->setUrl($url);

        $casaEditriceRepository = new CasaEditriceRepository();
        $casaEditriceRepository->save($casaEditrice);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    } catch (Exception $exception) {
        $response->getBody()->write($exception->getMessage());
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(500);
    }
});

$app->delete('/casa-editrice/{id}', function (Request $request, Response $response, $args) {

    try {
        $id = $args['id'];

        $casaEditriceRepository = new CasaEditriceRepository();
        $casaEditrice = $casaEditriceRepository->findById($id);

        if ($casaEditrice) {
            $casaEditriceRepository->delete($casaEditrice);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } else {
            $response->getBody()->write('{"error":"Nessuna casa editrice trovata per l\'id specificato"}');
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(404);
        }
    } catch (Exception $exception) {
        $response->getBody()->write($exception->getMessage());
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(500);
    }
});
/***
 * AUTORE
 */
$app->get('/autore/list[/{orderFiel}[/{sort}]]', function ($request, $response, array $args) {

    $sort = ($args && $args['sort']) ? $args['sort'] : null;
    $orderFiel = ($args && $args['orderFiel']) ? $args['orderFiel'] : null;

    $params = $request->getQueryParams();

    $nome = (isset($params['nome'])) ? $params['nome'] : null;
    $cognome = (isset($params['cognome'])) ? $params['cognome'] : null;
    $nazionalita = (isset($params['nazionalita'])) ? $params['nazionalita'] : null;

    $autoreRepository = new AutoreRepository();
    $autori = $autoreRepository->getList($sort, $orderFiel, $nome, $cognome, $nazionalita);

    $payload = json_encode($autori);
    $response->getBody()->write($payload, JSON_PRETTY_PRINT);
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
});

$app->get('/autore/{id}', function (Request $request, Response $response, $args) {

    $id = $args['id'];

    $autoreRepository = new AutoreRepository();
    $autore = $autoreRepository->findById($id);

    if ($autore) {
        $serializer = JMS\Serializer\SerializerBuilder::create()->build();
        $payload = $serializer->serialize($autore, 'json');

        $response->getBody()->write($payload, JSON_PRETTY_PRINT);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    } else {
        $response->getBody()->write("{'error':'Nessun autore trovato per l'id specificato'}");
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(404);
    }
});

$app->addBodyParsingMiddleware();
$app->put('/autore/{id}', function (Request $request, Response $response, $args) {

    try {
        $id = $args['id'];

        $request_data = $request->getParsedBody();
        $nome = $request_data['nome'];
        $cognome = $request_data['cognome'];
        $note = $request_data['note'];
        $nazionalita = $request_data['nazionalita'];

        $autoreRepository = new AutoreRepository();
        $autore = $autoreRepository->findById($id);

        $autore->setNome($nome);
        $autore->setCognome($cognome);
        $autore->setNote($note);
        $autore->setNazionalita($nazionalita);

        $autoreRepository->update($autore);

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    } catch (Exception $exception) {
        $response->getBody()->write($exception->getMessage());
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(500);
    }
});

$app->addBodyParsingMiddleware();
$app->post('/autore', function (Request $request, Response $response) {

    try {

        $request_data = $request->getParsedBody();
        $nome = $request_data['nome'];
        $cognome = $request_data['cognome'];
        $note = $request_data['note'];
        $nazionalita = $request_data['nazionalita'];

        $autore = new Autore();
        $autore->setNome($nome);
        $autore->setCognome($cognome);
        $autore->setNote($note);
        $autore->setNazionalita($nazionalita);

        $autoreRepository = new AutoreRepository();
        $autoreRepository->save($autore);

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    } catch (Exception $exception) {
        $response->getBody()->write($exception->getMessage());
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(500);
    }
});

$app->delete('/autore/{id}', function (Request $request, Response $response, $args) {

    try {
        $id = $args['id'];

        $autoreRepository = new AutoreRepository();
        $autore = $autoreRepository->findById($id);

        if ($autore) {
            $autoreRepository->delete($autore);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } else {
            $response->getBody()->write('{"error":"Nessun autore trovato per l\'id specificato"}');
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(404);
        }
    } catch (Exception $exception) {
        $response->getBody()->write($exception->getMessage());
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(500);
    }
});

$app->run();

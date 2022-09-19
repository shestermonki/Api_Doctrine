<?php

namespace Sudoku\Controller;

use Slim\Http\Response as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Sudoku\Model\Player;
use Sudoku\Model\DB;
use Sudoku\Model\PlayerValidator;
use Sudoku\Model\SudokusValidator;
use Sudoku\Model\Sudokus;

class SudokuController
{
  public static function initRoutes($app)
  {
    //sudoku
    $app->get('/sudoku', '\Sudoku\Controller\SudokuController:getAllSudokus');
    $app->get('/sudoku/{id:[0-9]+}', '\Sudoku\Controller\SudokuController:getSudokuById');
    $app->delete('/sudoku/{id:[0-9]+}', '\Sudoku\Controller\SudokuController:deleteSudoku');
    $app->post('/sudoku', '\Sudoku\Controller\SudokuController:postSudoku');
    $app->put('/sudoku/{id:[0-9]+}', '\Sudoku\Controller\SudokuController:putSudoku');
    $app->patch('/sudoku/{id:[0-9]+}', '\Sudoku\Controller\SudokuController:patchSudoku');
    //player
    $app->get('/player', '\Sudoku\Controller\SudokuController:getAllPlayers');
    $app->get('/player/{id:[0-9]+}', '\Sudoku\Controller\SudokuController:getPlayerById');
    $app->delete('/player/{id:[0-9]+}', '\Sudoku\Controller\SudokuController:deletePlayer');
    $app->get('/player/{username:[a-zA-Z]+}', '\Sudoku\Controller\SudokuController:getPlayerByName');
    $app->post('/player', '\Sudoku\Controller\SudokuController:postPlayer');
    $app->put('/player/{id:[0-9]+}', '\Sudoku\Controller\SudokuController:putPlayer');
    $app->patch('/player/{id:[0-9]+}', '\Sudoku\Controller\SudokuController:patchPlayer');
  }

  public function getAllPlayers(Request $request, Response $response, array $args)
  {
    $em = DB::getEM();
    $players = $em->getRepository('Sudoku\Model\Player')->findAll();
    if (is_null($players)) {
      $response = $response->withStatus(500);
    } else {
      $response = $response->withJson($players);
    }
    return $response;
  }

  public function getPlayerById(Request $request, Response $response, array $args)
  {
    $id = $args['id'];
    $em = DB::getEM();
    $player = $em->find('Sudoku\Model\Player', $id);
    if (is_null($player)) {
      $response = $response->withStatus(404);
    } else {
      $response = $response->withJson($player);
    }
    return $response;
  }

  public function getPlayerByName(Request $request, Response $response, array $args)
  {
    $username = $args['username'];
    $em = DB::getEM();
    $player = $em->getRepository('Sudoku\Model\Player')->findOneBy(['username' => $username]);
    if (is_null($player)) {
      $response = $response->withStatus(404);
    } else {
      $response = $response->withJson($player);
    }
    return $response;
  }

  public function postPlayer(Request $request, Response $response, array $args)
  {
    $validator = new PlayerValidator();
    $data = $request->getParsedBody();
    $validator->mergeData($data, true);
    $player = $validator->validatePersist();
    if (is_null($player)) return $response->withStatus(400);
    return $response->withJson($player);
  }

  public function deletePlayer(Request $request, Response $response, array $args)
  {
    $id = $args['id'];
    $em = DB::getEM();
    $player = $em->find('Sudoku\Model\Player', $id);
    if (is_null($player)) {
      return $response->withStatus(404, 'player not found');
    }
    $em->remove($player);
    $em->flush();
    return $response->withStatus(200);
  }

  public function putPlayer(Request $request, Response $response, array $args)
  {
    $id = $args['id'];
    $em = DB::getEM();
    $player = $em->find('Sudoku\Model\Player', $id);
    if (is_null($player)) return $response->withStatus(404);
    $validator = new PlayerValidator();
    $validator->loadplayer($player);
    $data = $request->getParsedBody();
    $validator->mergeData($data, true);
    $player = $validator->validatePersist();
    if (is_null($player)) return $response->withStatus(400);
    return $response->withJson($player);
  }

  public function patchPlayer(Request $request, Response $response, array $args)
  {
    $id = $args['id'];
    $em = DB::getEM();
    $player = $em->find('Sudoku\Model\Player', $id);
    if (is_null($player)) return $response->withStatus(404);
    $validator = new PlayerValidator();
    $validator->loadplayer($player);
    $data = $request->getParsedBody();
    $validator->mergeData($data, false);
    $player = $validator->validatePersist();
    if (is_null($player)) return $response->withStatus(400);
    return $response->withJson($player);
  }

  //SUDOKU

  public function getAllSudokus(Request $request, Response $response, array $args)
  {
    $em = DB::getEM();
    $sudokus = $em->getRepository('Sudoku\Model\Sudokus')->findAll();
    if (is_null($sudokus)) {
      $response = $response->withStatus(500);
    } else {
      $response = $response->withJson($sudokus);
    }
    return $response;
  }

  public function getSudokuById(Request $request, Response $response, array $args)
  {
    $id = $args['id'];
    $em = DB::getEM();
    $sudoku = $em->find('Sudoku\Model\Sudokus', $id);
    if (is_null($sudoku)) {
      $response = $response->withStatus(404);
    } else {
      $response = $response->withJson($sudoku);
    }
    return $response;
  }

  public function deleteSudoku(Request $request, Response $response, array $args)
  {
    $id = $args['id'];
    $em = DB::getEM();
    $sudoku = $em->find('Sudoku\Model\Sudokus', $id);
    if (is_null($sudoku)) {
      return $response->withStatus(404, 'sudoku not found');
    }
    $em->remove($sudoku);
    $em->flush();
    return $response->withStatus(200);
  }

  public function postSudoku(Request $request, Response $response, array $args)
  {
    $validator = new SudokusValidator();
    $data = $request->getParsedBody();
    $validator->mergeData($data, true);
    $sudoku = $validator->validatePersist();
    if (is_null($sudoku)) return $response->withStatus(400);
    return $response->withJson($sudoku);
  }

  public function putSudoku(Request $request, Response $response, array $args)
  {
    $id = $args['id'];
    $em = DB::getEM();
    $sudoku = $em->find('Sudoku\Model\Sudokus', $id);
    if (is_null($sudoku)) return $response->withStatus(404);
    $validator = new sudokusValidator();
    $validator->loadsudokus($sudoku);
    $data = $request->getParsedBody();
    $validator->mergeData($data, true);
    $sudoku = $validator->validatePersist();
    if (is_null($sudoku)) return $response->withStatus(400);
    return $response->withJson($sudoku);
  }

  public function patchSudoku(Request $request, Response $response, array $args)
  {
    $id = $args['id'];
    $em = DB::getEM();
    $sudoku = $em->find('Sudoku\Model\Sudokus', $id);
    if (is_null($sudoku)) return $response->withStatus(404);
    $validator = new sudokusValidator();
    $validator->loadsudokus($sudoku);
    $data = $request->getParsedBody();
    $validator->mergeData($data, false);
    $sudoku = $validator->validatePersist();
    if (is_null($sudoku)) return $response->withStatus(400);
    return $response->withJson($sudoku);
  }
}

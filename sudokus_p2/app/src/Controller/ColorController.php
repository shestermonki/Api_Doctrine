<?php

namespace Sudoku\Controller;

use Slim\Http\Response as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Sudoku\Model\DB;
use Sudoku\Model\Color;
use Sudoku\Model\ColorNameValidator;
use Sudoku\Model\ColorValidator;

class ColorController
{
  public static function initRoutes($app)
  {
    $app->get('/color', '\Sudoku\Controller\ColorController:getAllColors');
    $app->get('/color/{id:[0-9]+}', '\Sudoku\Controller\ColorController:getColorById');
    $app->get('/color/{name:[a-zA-Z]+}', '\Sudoku\Controller\ColorController:getColorByName');
    $app->post('/color', '\Sudoku\Controller\ColorController:postColor');
    $app->put('/color/{id:[0-9]+}', '\Sudoku\Controller\ColorController:putColor');
    $app->patch('/color/{id:[0-9]+}', '\Sudoku\Controller\ColorController:patchColor');
    $app->delete('/color/{id:[0-9]+}', '\Sudoku\Controller\ColorController:deleteColor');
    // Color names
    $app->get('/color/{cid:[0-9]+}/name', '\Sudoku\Controller\ColorController:getAllColorNamesByColorId');
    $app->post('/color/{cid:[0-9]+}/name', '\Sudoku\Controller\ColorController:postColorName');
    $app->put('/color/{cid:[0-9]+}/name/{nid:[0-9]+}', '\Sudoku\Controller\ColorController:putColorName');
    $app->patch('/color/{cid:[0-9]+}/name/{nid:[0-9]+}', '\Sudoku\Controller\ColorController:patchColorName');
    $app->delete('/color/{cid:[0-9]+}/name/{nid:[0-9]+}', '\Sudoku\Controller\ColorController:deleteColorName');
  }

  // --- COLORS --- //

  public function getAllColors(Request $request, Response $response, array $args)
  {
    $em = DB::getEM();
    $colors = $em->getRepository('Sudoku\Model\Color')->findAll();
    if (is_null($colors)) {
      $response = $response->withStatus(500);
    } else {
      $response = $response->withJson($colors);
    }
    return $response;
  }
  public function getColorById(Request $request, Response $response, array $args)
  {
    $id = $args['id'];
    $em = DB::getEM();
    $color = $em->find('Sudoku\Model\Color', $id);
    if (is_null($color)) {
      $response = $response->withStatus(404);
    } else {
      $response = $response->withJson($color);
    }
    return $response;
  }
  public function getColorByName(Request $request, Response $response, array $args)
  {
    $name = $args['name'];
    $em = DB::getEM();
    $color = $em->getRepository('Sudoku\Model\Color')->findOneBy(['name' => $name]);
    if (is_null($color)) {
      $response = $response->withStatus(404);
    } else {
      $response = $response->withJson($color);
    }
    return $response;
  }
  public function postColor(Request $request, Response $response, array $args)
  {
    $validator = new ColorValidator();
    $data = $request->getParsedBody();
    $validator->mergeData($data, true);
    $color = $validator->validatePersist();
    if (is_null($color)) return $response->withStatus(400);
    return $response->withJson($color);
  }
  public function putColor(Request $request, Response $response, array $args)
  {
    $id = $args['id'];
    $em = DB::getEM();
    $color = $em->find('Sudoku\Model\Color', $id);
    if (is_null($color)) return $response->withStatus(404);
    $validator = new ColorValidator();
    $validator->loadColor($color);
    $data = $request->getParsedBody();
    $validator->mergeData($data, true);
    $color = $validator->validatePersist();
    if (is_null($color)) return $response->withStatus(400);
    return $response->withJson($color);
  }
  public function patchColor(Request $request, Response $response, array $args)
  {
    $id = $args['id'];
    $em = DB::getEM();
    $color = $em->find('Sudoku\Model\Color', $id);
    if (is_null($color)) return $response->withStatus(404);
    $validator = new ColorValidator();
    $validator->loadColor($color);
    $data = $request->getParsedBody();
    $validator->mergeData($data, false);
    $color = $validator->validatePersist();
    if (is_null($color)) return $response->withStatus(400);
    return $response->withJson($color);
  }
  public function deleteColor(Request $request, Response $response, array $args)
  {
    $id = $args['id'];
    $em = DB::getEM();
    $color = $em->find('Sudoku\Model\Color', $id);
    if (is_null($color)) {
      return $response->withStatus(404, 'Color not found');
    }
    $em->remove($color);
    $em->flush();
    return $response->withStatus(200);
  }

  // --- COLOR NAMES --- //

  public function getAllColorNamesByColorId(Request $request, Response $response, array $args)
  {
    $cid = $args['cid'];
    $em = DB::getEM();
    $color = $em->find('Sudoku\Model\Color', $cid);
    if (is_null($color)) return $response->withStatus(404);
    return $response->withJson($color->names->toArray());
  }

  public function postColorName(Request $request, Response $response, array $args)
  {
    $cid = $args['cid'];
    $em = DB::getEM();
    $color = $em->find('Sudoku\Model\Color', $cid);
    if (is_null($color)) return $response->withStatus(404);
    $validator = new ColorNameValidator();
    $data = $request->getParsedBody();
    $validator->setColor($color);
    $validator->mergeData($data, true);
    $colorName = $validator->validatePersist();
    if (is_null($colorName)) return $response->withStatus(400);
    return $response->withJson($colorName);
  }

  public function putColorName(Request $request, Response $response, array $args)
  {
    $cid = $args['cid'];
    $nid = $args['nid'];
    $em = DB::getEM();
    $color = $em->find('Sudoku\Model\Color', $cid);
    if (is_null($color)) return $response->withStatus(404);
    $colorName = $em->find('Sudoku\Model\ColorName', $nid);
    if (is_null($colorName)) return $response->withStatus(404);
    if ($colorName->color->id != $color->id) return $response->withStatus(400);
    $validator = new ColorNameValidator();
    $validator->loadColorName($colorName);
    $data = $request->getParsedBody();
    $validator->mergeData($data, true);
    $colorName = $validator->validatePersist();
    if (is_null($colorName)) return $response->withStatus(400);
    return $response->withJson($colorName);
  }

  public function patchColorName(Request $request, Response $response, array $args)
  {
    $cid = $args['cid'];
    $nid = $args['nid'];
    $em = DB::getEM();
    $color = $em->find('Sudoku\Model\Color', $cid);
    if (is_null($color)) return $response->withStatus(404);
    $colorName = $em->find('Sudoku\Model\ColorName', $nid);
    if (is_null($colorName)) return $response->withStatus(404);
    if ($colorName->color->id != $color->id) return $response->withStatus(400);
    $validator = new ColorNameValidator();
    $validator->loadColorName($colorName);
    $data = $request->getParsedBody();
    $validator->mergeData($data, false);
    $colorName = $validator->validatePersist();
    if (is_null($colorName)) return $response->withStatus(400);
    return $response->withJson($colorName);
  }

  public function deleteColorName(Request $request, Response $response, array $args)
  {
    $cid = $args['cid'];
    $nid = $args['nid'];
    $em = DB::getEM();
    $color = $em->find('Sudoku\Model\Color', $cid);
    if (is_null($color)) return $response->withStatus(404);
    $colorName = $em->find('Sudoku\Model\ColorName', $nid);
    if (is_null($colorName)) return $response->withStatus(404);
    if ($colorName->color->id != $color->id) return $response->withStatus(400);
    $em->remove($colorName);
    $em->flush();
    return $response->withStatus(200);
  }
}

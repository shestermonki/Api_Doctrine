<?php

namespace Sudoku;

use Slim\Factory\AppFactory;

class Sudoku
{
  public static function processRequest()
  {
    $app = AppFactory::create();
    \Sudoku\Controller\HelloController::initRoutes($app);
    \Sudoku\Controller\ColorController::initRoutes($app);
    \Sudoku\Controller\SudokuController::initRoutes($app);
    $authMiddleware = new AuthMiddleware();
    $app->add($authMiddleware);
    $app->run();
  }
}

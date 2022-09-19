<?php

namespace Sudoku\Model;

class Database
{
  protected static ?\Sudoku\Model\Database $instance = null;

  public static function getInstance(): \Sudoku\Model\Database
  {
    if (is_null(static::$instance)) {
      static::$instance = new \Sudoku\Model\Database();
    }
    return static::$instance;
  }

  private \PDO $conn;

  protected function __construct()
  {
    $this->conn = new \PDO(
      "mysql:host=sudoku_db;dbname=sudokudb",
      "sudokuuser",
      "sudokupassword"
    );
  }

  public function getConnection(): \PDO
  {
    return $this->conn;
  }
}

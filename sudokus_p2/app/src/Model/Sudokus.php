<?php

namespace Sudoku\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="sudokus")
 */
class Sudokus implements \JsonSerializable
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue
   */
  public ?int $id;
  /** @ORM\Column(type="integer") */
  public int $level;
  /** @ORM\Column(type="string") */
  public string $problem;
  /** @ORM\Column(type="string") */
  public string $solved;


  public $levels;

  public function __construct()
  {
    $this->levels = new ArrayCollection();
  }


  // Needed for implicit JSON serialization with json_encode()
  public function jsonSerialize()
  {
    return [
      'id' => $this->id,
      'level' => $this->level,
      'problem' => $this->problem,
      'solved' => $this->solved,
    ];
  }
}

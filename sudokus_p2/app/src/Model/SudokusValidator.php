<?php

namespace Sudoku\Model;

class SudokusValidator
{
    public $sudoku;

    public function __construct()
    {
        $this->sudoku = new Sudokus();
    }

    public function loadSudokus($sudoku)
    {
        $this->sudoku = $sudoku;
    }

    public function mergeData($data, $nullIfNotSet = true)
    {
        foreach (['level', 'problem', 'solved'] as $key) {
            if (isset($data[$key])) {
                $this->sudoku->$key = trim($data[$key]);
            } else if ($nullIfNotSet) {
                $this->sudoku->$key = null;
            }
        }
    }

    // Validate integrity of data
    public function validate()
    {
        // Check all fields are set
        foreach (["level", "problem", "solved"] as $key) {
            if (!isset($this->sudoku->$key) || is_null($this->sudoku->$key)) return false;
        }
        // Validate numbers
        foreach (["level"] as $key) {
            $value = (int)$this->sudoku->$key;
            $this->sudoku->$key = $value;
            if (!is_numeric($value) || ($value < 0) || ($value > 255)) {
                return false;
            }
        }
        // Validate name
        /*$this->player->username = trim($this->player->username);
        if (empty($this->player->username)) return false;
        $em = DB::getEM();
        $other = $em->getRepository('Sudoku\Model\Player')->findOneBy(['username' => $this->player->username]);
        if (!is_null($other) && is_null($this->player->id)) return false;
        if (!is_null($other) && ($other->id != $this->player->id)) return false;
        return true;*/

        //validate problem
        $this->sudoku->problem = trim($this->sudoku->problem);
        if (empty($this->sudoku->problem)) return false;
        $em = DB::getEM();
        $other = $em->getRepository('Sudoku\Model\Sudokus')->findOneBy(['problem' => $this->sudoku->problem]);
        if (!is_null($other) && is_null($this->sudoku->id)) return false;
        if (!is_null($other) && ($other->id != $this->sudoku->id)) return false;
        return true;

        //validate solved
        $this->sudoku->solved = trim($this->sudoku->solved);
        if (empty($this->sudoku->solved)) return false;
        $em = DB::getEM();
        $other = $em->getRepository('Sudoku\Model\Sudokus')->findOneBy(['solved' => $this->sudoku->solved]);
        if (!is_null($other) && is_null($this->sudoku->id)) return false;
        if (!is_null($other) && ($other->id != $this->sudoku->id)) return false;
        return true;
    }

    public function validatePersist()
    {
        $ok = $this->validate();
        if (!$ok) return null;
        $em = DB::getEM();
        $em->persist($this->sudoku);
        $em->flush();
        return $this->sudoku;
    }
}

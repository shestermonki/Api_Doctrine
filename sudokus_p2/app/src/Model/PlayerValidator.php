<?php

namespace Sudoku\Model;

class PlayerValidator
{
    public $player;

    public function __construct()
    {
        $this->player = new Player();
    }

    public function loadPlayer($player)
    {
        $this->player = $player;
    }

    public function mergeData($data, $nullIfNotSet = true)
    {
        foreach (['username', 'password', 'email', 'token', 'admin'] as $key) {
            if (isset($data[$key])) {
                $this->player->$key = trim($data[$key]);
            } else if ($nullIfNotSet) {
                $this->player->$key = null;
            }
        }
    }

    // Validate integrity of data
    public function validate()
    {
        // Check all fields are set
        foreach (["username", "password", "email", "token"] as $key) {
            if (!isset($this->player->$key) || is_null($this->player->$key)) return false;
        }

        // Validate name
        $this->player->username = trim($this->player->username);
        if (empty($this->player->username)) return false;
        $em = DB::getEM();
        $other = $em->getRepository('Sudoku\Model\Player')->findOneBy(['username' => $this->player->username]);
        if (!is_null($other) && is_null($this->player->id)) return false;
        if (!is_null($other) && ($other->id != $this->player->id)) return false;
        return true;

        //validate email
        $this->player->email = trim($this->player->email);
        if (empty($this->player->email)) return false;
        $em = DB::getEM();
        $other = $em->getRepository('Sudoku\Model\Player')->findOneBy(['email' => $this->player->email]);
        if (!is_null($other) && is_null($this->player->id)) return false;
        if (!is_null($other) && ($other->id != $this->player->id)) return false;
        return true;

        //validate password
        $this->player->password = trim($this->player->password);
        if (empty($this->player->password)) return false;
        $em = DB::getEM();
        $other = $em->getRepository('Sudoku\Model\Player')->findOneBy(['password' => $this->player->password]);
        if (!is_null($other) && is_null($this->player->id)) return false;
        if (!is_null($other) && ($other->id != $this->player->id)) return false;
        return true;

        //validate tokken
        $this->player->token = trim($this->player->token);
        if (empty($this->player->token)) return false;
        $em = DB::getEM();
        $other = $em->getRepository('Sudoku\Model\Player')->findOneBy(['token' => $this->player->token]);
        if (!is_null($other) && is_null($this->player->id)) return false;
        if (!is_null($other) && ($other->id != $this->player->id)) return false;
        return true;
    }

    public function validatePersist()
    {
        $ok = $this->validate();
        if (!$ok) return null;
        $em = DB::getEM();
        $em->persist($this->player);
        $em->flush();
        return $this->player;
    }
}

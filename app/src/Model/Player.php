<?php

namespace ApiSudoku\Model;

// Implements JsonSerializable for implicit json_encode() serialization
class Player implements \JsonSerializable {
  private ?int $id;
  private string $username;
  private string $password;
  private string $email;

  public function __construct(?int $id, string $username, string $password, string $email) {
    $this->id = $id;
    $this->username = $username;
    $this->password = $password;
    $this->email = $email;
  }

  public function getId() : ?int { return $this->id; }
  public function setId(?int $id) { $this->id = $id; }
  public function getUsername() : string { return $this->username; }
  public function setUsername(string $username) { $this->username = $username; }
  public function getPassword() : string { return $this->password; }
  public function setPassword(string $password) { $this->password = $password; }
  public function getEmail() : string { return $this->email; }
  public function setEmail(string $email) { $this->email = $email; }

  // $length must be an even integer greater or equal to 4
  public static function randomPassword(int $length = 10) {
      $chars1 = "abcdefghijklmnopqrstuvwxyz";
      $chars2 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $chars3 = "0123456789";
      $chars4 = "!$%&/+-_.:*";
      $password = substr(str_shuffle($chars1), 0, $length / 2 - 1);
      $password.= substr(str_shuffle($chars2), 0, $length / 2 - 1);
      $password.= substr(str_shuffle($chars3), 0, 1);
      $password.= substr(str_shuffle($chars4), 0, 1);
      $password = str_shuffle($password);
      return $password;
  }

  // Needed to deserialize an object from an associative array
  public static function fromAssoc(array $data) : Player {
    return new \ApiSudoku\Model\Player(
      $data['id'], 
      $data['username'],
      $data['password'], 
      $data['email']
    );
  }

  // Needed for implicit JSON serialization with json_encode()
  public function jsonSerialize() {
    return [
      'id' => $this->id,
      'username' => $this->username,
      'password' => $this->password,
      'email' => $this->email,
    ];
  }

  // DAO METHODS
  public static function getAllPlayers() : array {
    $sql = "SELECT * FROM players";
    $conn = Database::getInstance()->getConnection();
    $result = $conn->query($sql);
    $playersAssoc = $result->fetchAll(\PDO::FETCH_ASSOC);
    if (!$playersAssoc) return [];
    $players = [];
    foreach($playersAssoc as $playerAssoc) {
      $players[] = \ApiSudoku\Model\Player::fromAssoc($playerAssoc);
    }
    return $players;
  }

  public static function getPlayerByUsername(string $username) : ?\ApiSudoku\Model\Player {
    $sql = "SELECT * FROM players WHERE username=:username";
    $conn = Database::getInstance()->getConnection();
    $statement = $conn->prepare($sql);
    $result = $statement->execute([
      ':username' => $username
    ]);
    $playerAssoc = $statement->fetch(\PDO::FETCH_ASSOC);
    if (!$playerAssoc) return null;
    $player = \ApiSudoku\Model\Player::fromAssoc($playerAssoc);
    return $player;
  }

  public static function getPlayerById(int $id) : ?\ApiSudoku\Model\Player {
    $sql = "SELECT * FROM players WHERE id=:id";
    $conn = Database::getInstance()->getConnection();
    $statement = $conn->prepare($sql);
    $result = $statement->execute([
      ':id' => $id
    ]);
    $playerAssoc = $statement->fetch(\PDO::FETCH_ASSOC);
    if (!$playerAssoc) return null;
    $player = \ApiSudoku\Model\Player::fromAssoc($playerAssoc);
    return $player;
  }

  public static function persistPlayer(Player $player) : ?Player {
    if (is_null($player->getId())) {
      return static::insertPlayer($player);
    }
    else {
      return static::updatePlayer($player);
    }
  }

  public static function insertPlayer(\ApiSudoku\Model\Player $player) : ?\ApiSudoku\Model\Player {
    $sql = "INSERT INTO players VALUES (:id, :username, :password, :email)";
    $conn = Database::getInstance()->getConnection();
    $statement = $conn->prepare($sql);
    $result = $statement->execute([
      ':id' => null,
      ':username' => $player->getUsername(),
      ':password' => $player->getPassword(),
      ':email' => $player->getEmail()
    ]);
    $id = $conn->lastInsertId();
    return static::getPlayerById($id);
  }

  public static function updatePlayer($player) : ?\ApiSudoku\Model\Player {
    $id = $player->getId();
    if (is_null(static::getPlayerById($id))) return null;
    $sql = "UPDATE players SET username=:username, password=:password, email=:email WHERE id=:id";
    $conn = Database::getInstance()->getConnection();
    $statement = $conn->prepare($sql);
    $result = $statement->execute([
      ':id' => $id,
      ':username' => $player->getUsername(),
      ':password' => $player->getPassword(),
      ':email' => $player->getEmail()
    ]);
    return static::getPlayerById($id);
  }

  public static function deletePlayer(\ApiSudoku\Model\Player $player) : bool {
    return static::deletePlayerById($player->getId());
  }

  public static function deletePlayerById(int $id) : bool {
    $sql = "DELETE FROM players WHERE id=:id";
    $conn = Database::getInstance()->getConnection();
    $statement = $conn->prepare($sql);
    $result = $statement->execute([
      ':id' => $id
    ]);
    return $result;
  }

}
<?php

declare(strict_types=1);

namespace App;

require_once('src/Exception/AppException.php');
require_once("Exception/NotFoundException.php");

use App\Exception\ConfigurationException;
use App\Exception\StorageException;
use App\Exception\NotFoundException;
use Exception;
use Throwable;
use PDO;
use PDOException;

class Database
{
  private PDO $connection;

  public function __construct(array $config)
  {
    try {
      $this->validateConfig($config);
      $this->createConnection($config);

    } catch (PDOException $e) {
      throw new StorageException('Connection error');
    }
  }

  public function createAdvert(array $data): void
  {
    try {
      $firstName = $this->connection->quote($data['firstName']);
      $city = $this->connection->quote($data['city']);
      $title = $this->connection->quote($data['title']);
      $email = $this->connection->quote($data['email']);
      $phone = $this->connection->quote($data['phone']);
      $description = $this->connection->quote($data['description']);
      $createdat = date('Y-m-d H:i:s');
      $category = $this->connection->quote($data['category']);
      $query =
        "INSERT INTO adverts(firstName, title, city, email, phone, description, created_at, category)
        VALUES($firstName, $title, $city, $email, $phone, $description, '$createdat', $category)";
      $this->connection->exec($query);
    } catch (Throwable $e) {
      throw new StorageException('Failed create new advert', 400, $e);
      exit;
    }

  }

  public function getAdvert(int $id): array
  {
      try {
        $query = "SELECT * FROM adverts WHERE id= $id";
        $result = $this->connection->query($query);
        $advert = $result->fetch(PDO::FETCH_ASSOC);
      } catch (Throwable $e) {
        throw new StorageException('nie udalo sie pobrac ogloszenia', 400, $e);
      }
      if (!$advert) {
          throw new NotFoundException("Ogłoszenie o id: $id nie istnieje");
      }
      return $advert;
  }

  public function getAdverts(): array
  {
    $adverts = [];
    $query = "SELECT * FROM adverts ORDER BY created_at DESC";
    $result = $this->connection->query($query);
    $adverts = $result->fetchAll(PDO::FETCH_ASSOC);
    return $adverts;
  }

  private function createConnection(array $config): void
  {
    $dsn = "mysql:dbname={$config['database']};host={$config['host']}";
    $user = $config['user'];
    $password = $config['password'];
    $this->connection = new PDO($dsn, $user, $password,
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
  }

  public function validateConfig(array $config): void
  {
    if (
      empty($config['database'])
      || empty($config['host'])
      || empty($config['user'])

    ) {
        throw new ConfigurationException('Storage configuration error');
      }
  }
}

<?php

  declare(strict_types=1);

  namespace App;

  require_once("src/Exception/ConfigurationException.php");

  use App\Exception\ConfigurationException;
  use App\Exception\NotFoundException;

  require_once("src/View.php");
  require_once("src/Database.php");

  class Controller
  {
    private static array $configuration = [];
    private const DEFAULT_ACTION = 'list';
    private array $request;
    private View $view;
    private Database $database;

    public static function initConfiguration(array $configuration): void
    {
      self::$configuration = $configuration;
    }

    public function __construct(array $request)
    {
      if (empty(self::$configuration)) {
      throw new ConfigurationException('Configuration error');
      }
      $this->database = new Database(self::$configuration);
      $this->request = $request;
      $this->view = new View();
    }

    public function run(): void
    {
      $action = $this->request['GET']['action'] ?? self::DEFAULT_ACTION;

      switch ($action) {
        case 'create':
          $page ='create';
          $requestPost = $this->getRequestPost();
          if (!empty($requestPost)) {
            $addData = [
            'firstName' => $requestPost['firstName'],
            'city' => $requestPost['city'],
            'phone' => $requestPost['phone'],
            'email' => $requestPost['email'],
            'title' => $requestPost['title'],
            'category' => $requestPost['category'],
            'description' => $requestPost['description']
            ];
            $this->database->createAdvert($addData);
            header('Location: /?before=created');
            exit;
          }
          break;

        case 'show':
          $page = 'show';

          $data = $this->getRequestGet();
          $advertId = (int) ($data['id'] ?? null);
          if (!$advertId) {
            header('Location: /?error=missingAdvertId');
            exit;
          }
          try {
            $advert = $this->database->getAdvert($advertId);
          } catch (NotFoundException $e) {
            header('Location: /?error=AdvertNotFound');
            exit;
          }
          $viewParams = [
          'advert' => $advert
          ];
          break;
        default:
          $page = 'list';
          $data = $this->getRequestGet();
          $viewParams = [
            'adverts' => $this->database->getAdverts(),
            'before' => $data['before'] ?? null,
            'error' => $data['error'] ?? null
          ];
          break;
      }

      $this->view->render($page, $viewParams ?? []);
    }

    private function getRequestGet(): array
    {
      return $this->request['GET'] ?? [];
    }

    private function getRequestPost(): array
    {
      return $this->request['POST'] ?? [];
    }
  }

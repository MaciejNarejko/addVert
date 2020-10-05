<?php

  declare(strict_types=1);

  namespace App;

  use App\Exception\AppException;
  use App\Exception\ConfigurationException;
  use Throwable;

  require_once("src/Utils/debug.php");
  require_once("src/Controller.php");
  require_once("src/Exception/AppException.php");

  $configuration = require_once("config/config.php");

  $request = [
    'GET' => $_GET,
    'POST' => $_POST
  ];

try {
  Controller::initConfiguration($configuration);
  $controller = new Controller($request);
  $controller->run();

} catch (ConfigurationException $e) {
  echo '<h3>Error Application</h3>';
  echo $e->getMessage();
  echo '<h3>Please try again later</h3>';
} catch (AppException $e) {
    echo $e->getMessage();
    echo '<h3>Error Application</h3>';
} catch (Throwable $e) {
    echo $e->getMessage();
    echo '<h3>Error Application</h3>';
}

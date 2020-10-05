<?php

declare(strict_types=1);

error_reporting(E_ALL); // wyswietlanie wszystkich bledow wlacznie z mniej waznymi
ini_set('display_errors','1'); // rzeczy konfiguracyjne w php np. wyswietlanie bledow

function dump($data)
{
  echo '<div
    style="
      display: inline-block;
      padding: 0 10px;
      border: 2px solid black;
      background: lightgrey;
      "
    >
    <pre>';
    print_r($data);
    echo '</pre>
    </div>
    <br>';
}

<?php
require_once(__DIR__ . '/src/Core/Loader.php');

\Core\ClassRepository::create()->setMinified('{
  "class": {
    "name": "Test",
    "methods": {
      "method": {
        "arguments": [],
        "body": "return 123;"
      }
    }
  }
}');

$test = \Core\ClassRepository::create()->instantiate('Test');
var_dump($test->method());

\Core\ClassRepository::create()->setMinified('{
  "class": {
    "name": "Test",
    "methods": {
      "method": {
        "arguments": [],
        "body": "return 321;"
      },
      "newMethod": {
        "arguments": [],
        "body": "return mt_rand(0, 228);"
      },
      "sum": {
        "arguments": ["$left", "$right"],
        "body": "return $left + $right;"
      }
    }
  }
}');

$test = \Core\ClassRepository::create()->instantiate('Test');
var_dump($test->sum(1, 2));
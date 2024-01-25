<?php

  header('Content-Type: application/json');
  header("Access-Control-Allow-Headers: X-Requested-With");
  header("Access-Control-Allow-Origin: http://localhost:5173");

  $tasks = [
    [
      'name' => 'task 1',
      'done' => false,
    ],
    [
      'name' => 'task 2',
      'done' => true,
    ],
    [
      'name' => 'task 3',
      'done' => true,
    ],
    [
      'name' => 'task 4',
      'done' => false,
    ],
  ];

  $jsonTasks = json_encode($tasks);
  echo $jsonTasks;
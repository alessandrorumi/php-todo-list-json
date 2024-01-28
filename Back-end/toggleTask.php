<?php

  header('Content-Type: application/json');
  header("Access-Control-Allow-Headers: X-Requested-With");
  header("Access-Control-Allow-Origin: http://localhost:5173");

  $id = $_GET['id'];
  $jsonTasks = file_get_contents('tasks.json');
  $tasks = json_decode($jsonTasks, true);

  $tasks[$id]['done'] = !$tasks[$id]['done'];

  $jsonTasks = json_encode($tasks);
  file_put_contents('tasks.json', $jsonTasks);
  echo $jsonTasks;
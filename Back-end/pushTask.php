<?php

  header('Content-Type: application/json');
  header("Access-Control-Allow-Headers: X-Requested-With");
  header("Access-Control-Allow-Origin: http://localhost:5173");

  // $tasks = [
  //   [
  //     'text' => 'task 1',
  //     'done' => false,
  //   ],
  //   [
  //     'text' => 'task 2',
  //     'done' => true,
  //   ],
  //   [
  //     'text' => 'task 3',
  //     'done' => true,
  //   ],
  //   [
  //     'text' => 'task 4',
  //     'done' => false,
  //   ],
  // ];

  // $text = $_GET['text'];
  // $newTask = [
  // 'text' => $text,
  // 'done' => false,
  // ];

  // $tasks[] = $newTask;
  // $jsonTasks = json_encode($tasks);
  // echo $jsonTasks;

  $jsonTasks = file_get_contents('tasks.json');
  $tasks = json_decode($jsonTasks, true);

  $text = $_GET['text'];
  $newTask = [
  'text' => $text,
  'done' => false,
  ];
  $tasks[] = $newTask;

  $jsonTasks = json_encode($tasks);
  file_put_contents('tasks.json', $jsonTasks);
  echo $jsonTasks;
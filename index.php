<?php
require "./task.class.php";

// get configs & schedules
$configs = json_decode(file_get_contents("./config/config.json"), true)['configs'] ?? [];
$schedules = json_decode(file_get_contents("./config/schedule.json"), true)['schedules'] ?? [];

$task = new Task();


foreach ($configs as $key => $config) {
    $task->getFile($config);
    $task->encodeFile($config);
    $task->zipFile($config);
    $task->moveFile($config);
    $task->saveToDB($config);
    $task->remove($config);
}


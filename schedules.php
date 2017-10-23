<?php
require "./task.class.php";

// get configs & schedules
$configs = json_decode(file_get_contents("./config/config.json"), true)['configs'] ?? [];
$schedules = json_decode(file_get_contents("./config/schedule.json"), true)['schedules'] ?? [];

$task = new Task();


foreach ($configs as $key => $config) {
    if( checkDateTimeAndExt($config) === false ) {
        continue;
    }
    $task->getFile($config);
    $task->encodeFile($config);
    $task->zipFile($config);
    $task->moveFile($config);
    $task->saveToDB($config);
    $task->remove($config);
}


/**
 * 判斷是否為執行時間及檔案
 * @return bool
 */
function checkDateTimeAndExt($config) {}


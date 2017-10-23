<?php
require "./task.class.php";

// get configs & schedules
$configs = json_decode(file_get_contents("./config/config.json"), true)['configs'] ?? [];
$schedules = json_decode(file_get_contents("./config/schedule.json"), true)['schedules'] ?? [];

$task = new Task();

foreach ($schedules as $key => $schedule) {

    foreach ($configs as $key => $config) {
        if( checkDateTimeAndExt($config, $schedule) === false ) {
            continue;
        }
        $task->getFile($config);
        $task->encodeFile($config);
        $task->zipFile($config);
        $task->moveFile($config);
        $task->saveToDB($config);
        $task->remove($config);
    }
}


/**
 * 判斷是否為執行時間及檔案
 * @return bool
 */
function checkDateTimeAndExt($config, $schedule) {
    // TODO
    $new = new DateTime();
    return $schedule['ext'] === $config['ext'] && schedule['interval'] === $new;
}

/**
 * format interval to datetime
 * @return Datetime
 */
function formatDateTimeInterval($schedule) {
    // TODO
}

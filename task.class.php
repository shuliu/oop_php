<?php

class Task {

    function __construct() {}

    /**
     * 取得檔案實體
     */
    function getFile($config) {
        return file_get_contents($config['location']);
    }

    /**
     * 壓縮
     */
    function zipFile($config) {}
        $zip = new ZipArchive; 
        $zip->open($config['location']); 
        $zip->extractTo($config['location']); 
        $zip->close();
    }

    /**
     * 編碼
     */
    function encodeFile($config) {
        // TODO 檔案加密
    }

    /**
     * move
     */
    function moveFile($config) {
        return copy($config['location'], $config['dir']);
    }

    /**
     * remove
     */
    function removeFile($config) {
        return delete($config['location'])
    }

    /**
     * save to db
     */
    function saveToDB($config) {
        $db = new DB();
        $file = file_get_contents($config['location']);
        return $db->save('TABLE_NAME', $file);
    }


}
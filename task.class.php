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
    function encodeFile($config) {}

    /**
     * move
     */
    function moveFile($config) {}

    /**
     * remove
     */
    function removeFile($config) {}

    /**
     * save to db
     */
    function saveToDB($config) {}


}
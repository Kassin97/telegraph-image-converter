<?php

class Utils
{
    public static function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    public static function sortFiles($arFiles)
    {
        usort($arFiles, function ($a, $b){
            $a = intval($a);
            $b = intval($b);

            if ($a == $b) {
                return 0;
            }
            return ($a < $b) ? -1 : 1;

        });

        return $arFiles;
    }


}
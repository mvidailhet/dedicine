<?php

function is_dir_empty($dir) {
    if (!is_readable($dir)) return NULL;
    $handle = opendir($dir);
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            return FALSE;
        }
    }
    return TRUE;
}

function removeEmptyDirectories($directory)
{
    if ($handle = opendir($directory))
        while (false !== ($file = readdir($handle)))
        {
            $filePath = $directory . "/" . $file;
            if ($file != "." && $file != ".." && is_dir($filePath))
            {
                if(is_dir_empty($filePath))
                {
                    rmdir($filePath);
                }
            }
        }
}

function getFileType($file)
{
    $videoExt = array("avi", "mp4", "wmv", "mpg", "mkv");

    if(is_dir($file))
        return "folder";
    else
    {
        $tmpArr = explode(".", $file);
        $ext = $tmpArr[count($tmpArr) - 1];
        if(in_array($ext, $videoExt))
            return "film";
        else
            return "file";
    }
}


function getDirectoryList($directory)
{
    $filesToAvoid = array("index.php", "parsedirectory.php", "films", "series", "apps", "musique", "application");

    $files = array();
    if ($handle = opendir($directory))
    {
        while (false !== ($file = readdir($handle)))
        {
            if ($file != "." && $file != ".." && substr($file, 0, 1) != "." && !in_array($file, $filesToAvoid))
            {
                $filePath = $directory."/".$file;
                $arr["name"] = $file;
                $arr["type"] = getFileType($filePath);
                $filemTime = filemtime($filePath);
                while(isset($files[$filemTime]))
                    $filemTime += 1;
                $arr["date"] = date ("M d", $filemTime);
                $files[$filemTime] = $arr;
            }
        }
        closedir($handle);

        krsort($files);

        return $files;
    }
}

function getRootDirectories()
{
    $rootDirectories = array();
    $rootDirectories["films"] = "Films";
    $rootDirectories["series"] = "Séries";
    $rootDirectories["musique"] = "Musique";
    $rootDirectories["apps"] = "Apps";
    return $rootDirectories;
}


function getSymbolByQuantity($bytes) {
    $symbols = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $exp = floor(log($bytes)/log(1024));

    return sprintf('%.2f '.$symbols[$exp], ($bytes/pow(1024, floor($exp))));
}

function getRemainingDiskSpace()
{
    return getSymbolByQuantity(disk_free_space("/"));
}

?>
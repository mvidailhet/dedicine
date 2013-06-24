<?php

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
    $filesToAvoid = array("styles", "index.php", "parsedirectory.php", "images", "sources", "views", "films", "series", "apps", "musique");

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
                $arr["date"] = date ("M d", $filemTime);
                $files[$filemTime] = $arr;
            }
        }
        closedir($handle);

        krsort($files);

        return $files;
    }
}

?>
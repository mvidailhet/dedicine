<?php require_once('config.php');?>

<!DOCTYPE html>
<html>

<head>
  <title>DeDiCiNé v0.3</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.js" type="text/javascript"></script>
    <link rel="stylesheet" href="styles/general.css">
</head>

<body>

<?php
require_once("sources/functions.php");
?>

<div id="header">
    <span class="v-aligner"></span><h1 class="verticalCenter">Welcome to Dediciné !</h1>
</div>

<div id="main">
<?php
/*if (is_dir(_FILES_BASE_DIRECTORY))
    if ($dh = opendir(_FILES_BASE_DIRECTORY))
        while(($file = readdir($dh)) !== false){
            $path = _FILES_BASE_DIRECTORY.DIRECTORY_SEPARATOR.$file;
            if (is_dir($path)):
?>
    <div class="block bigFolder first">
        <a href="parsedirectory.php?path=<?php echo $path;?>" class="title"><span class="v-aligner"></span><span class="verticalCenter"><?php echo $file;?></span></a>
        <?php
        $littleList = true;
        $currentDirectory = $path;
        include("views/filelist.php");
        ?>
    </div>
<?php
            endif;
        }*/
?>

    <div class="clear"></div>

    <div class="bigList">
        <h2>Downloads</h2>
        <?php
        $littleList = false;
        $currentDirectory = _FILES_BASE_DIRECTORY;
        include("views/filelist.php");
        ?>
    </div>

</div>


</body>
</html>

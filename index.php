<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.js" type="text/javascript"></script>
    <link rel="stylesheet" href="styles/general.css">
</head>

<body>

<?php
include_once("sources/functions.php");
?>

<div id="header">
    <span class="v-aligner"></span><h1 class="verticalCenter">Welcome to Dediciné !</h1>
</div>

<div id="main">

    <div class="block bigFolder first">
        <a href="parsedirectory.php?path=./films" class="title"><span class="v-aligner"></span><span class="verticalCenter">Films</span></a>
        <?php
        $littleList = true;
        $currentDirectory = "./films";
        include("views/filelist.php");
        ?>
    </div>

    <div class="block bigFolder">
        <a href="parsedirectory.php?path=./series" class="title"><span class="v-aligner"></span><span class="verticalCenter">Séries</span></a>
        <?php
        $littleList = true;
        $currentDirectory = "./series";
        include("views/filelist.php");
        ?>
    </div>

    <div class="block bigFolder">
        <a href="parsedirectory.php?path=./apps" class="title"><span class="v-aligner"></span><span class="verticalCenter">Apps</span></a>
        <?php
        $littleList = true;
        $currentDirectory = "./apps";
        include("views/filelist.php");
        ?>
    </div>

    <div class="block bigFolder last">
        <a href="parsedirectory.php?path=./musique" class="title"><span class="v-aligner"></span><span class="verticalCenter">Musique</span></a>
        <?php
        $littleList = true;
        $currentDirectory = "./musique";
        include("views/filelist.php");
        ?>
    </div>

    <div class="clear"></div>

    <div class="bigList">
        <h2>Autres fichiers</h2>
        <?php
        $littleList = false;
        $currentDirectory = ".";
        include("views/filelist.php");
        ?>
    </div>

</div>


</body>
</html>
<!DOCTYPE html>
<html>

<head>
    <title>Dédiciné</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mitch">

    <link href="application/assets/css/beforeBootstrapStyle.css" rel="stylesheet">
    <link href="application/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="application/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="application/assets/css/general.css" rel="stylesheet">

</head>

<body>

    <?php
        include_once("application/sources/functions.php");
        $rootDirectories = getRootDirectories();
    ?>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <p class="navbar-text pull-right">
                    Espace restant : <?php echo getRemainingDiskSpace(); ?>
                </p>
                <a class="brand" href="/">Dédiciné</a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="active"><a href="/">Home</a></li>
                        <?php foreach($rootDirectories as $folderName => $name) { ?>
                            <li><a href="<?php echo "parsedirectory.php?path=./".$folderName; ?>"><?php echo $name; ?></a></li>
                        <?php } ?>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row-fluid">

            <div class="span3">
                <div class="block">
                    <a href="parsedirectory.php?path=./films" class="title text-center">Films</a>
                    <?php
                    $littleList = true;
                    $currentDirectory = "./films";
                    include("application/views/filelist.php");
                    ?>
                </div>
            </div>
            <div class="span3">
                <div class="block">
                    <a href="parsedirectory.php?path=./series" class="title text-center">Séries</a>
                    <?php
                    $littleList = true;
                    $currentDirectory = "./series";
                    include("application/views/filelist.php");
                    ?>
                </div>
            </div>
            <div class="span3">
                <div class="block">
                    <a href="parsedirectory.php?path=./films" class="title text-center">Musique</a>
                    <?php
                    $littleList = true;
                    $currentDirectory = "./musique";
                    include("application/views/filelist.php");
                    ?>
                </div>
            </div>
            <div class="span3">
                <div class="block">
                    <a href="parsedirectory.php?path=./films" class="title text-center">Apps</a>
                    <?php
                    $littleList = true;
                    $currentDirectory = "./apps";
                    include("application/views/filelist.php");
                    ?>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="block">
                    <div class="title text-center">
                        Autres fichiers
                    </div>
                    <?php
                    $littleList = false;
                    $currentDirectory = ".";
                    include("application/views/filelist.php");
                    ?>
                </div>
            </div>
        </div>

        <hr>

        <footer>
            <p>&copy; Dédiciné 2013</p>
        </footer>

    </div><!--/.fluid-container-->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="application/bootstrap/js/bootstrap.js"></script>
</body>

<body>
</html>
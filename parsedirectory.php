<!DOCTYPE html>
<html>

<head>
    <title>Dédiciné</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }

        .sidebar-nav {
            padding: 9px 0;
        }
    </style>

    <link href="application/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="application/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="application/assets/css/general.css" rel="stylesheet">

</head>
<body>

    <?php
        include_once("application/sources/functions.php");
        $rootDirectories = getRootDirectories();
        $currentDirectory = $_GET["path"];
    ?>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" href="/">Dédiciné</a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li><a href="/">Home</a></li>
                        <?php foreach($rootDirectories as $folderName => $name) { ?>
                        <li <?php if("./" . $folderName == $currentDirectory) echo 'class="active"'; ?>><a href="<?php echo "parsedirectory.php?path=./".$folderName; ?>"><?php echo $name; ?></a></li>
                        <?php } ?>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>

    <?php
        $tmpArr = explode("/", $currentDirectory);
        $arrayLength = count($tmpArr);
        $currentDirectoryName = $tmpArr[$arrayLength - 1];

        if(count($tmpArr) <= 2)
            $backLink = "index.php";
        else
        {
            $backLink = "";
            $index = 0;
            foreach($tmpArr as $pathPart)
            {
                if($index == $arrayLength - 1)
                    break;
                if($index > 0)
                    $backLink  .= "/";
                $backLink .= $pathPart;
                $index++;
            }
            $backLink = "parsedirectory.php?path=".$backLink;
        }

    ?>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="block">
                    <div class="title text-center">
                        <a href="<?php echo $backLink; ?>" class="backButton"><div class="icon backWhite"></div></a>
                        <?php echo $currentDirectoryName; ?>
                    </div>
                    <?php
                    include("application/views/filelist.php");
                    ?>
                </div>
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
</html>
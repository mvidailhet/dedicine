<!DOCTYPE html>
<html>

<head>
    <title>Dédiciné</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="application/assets/css/beforeBootstrapStyle.css" rel="stylesheet">
    <link href="application/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="application/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="application/assets/css/general.css" rel="stylesheet">

</head>
<body>

    <?php
        include_once("application/sources/functions.php");
        include_once("application/sources/config.php");
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
        $breadcrumbArray[] = array("name" => "Home", "link" => "/");
        $link = ".";
        for($i = 1; $i < $arrayLength - 1; $i++)
        {
            if($i > 0)
                $link  .= "/";
            $link .= $tmpArr[$i];
            $breadcrumbArray[] = array("name" => "$tmpArr[$i]", "link" => "parsedirectory.php?path=".$link);
        }
    ?>

    <div class="container-fluid">

        <ul class="breadcrumb">
            <li><a href="/">Home</a> <span class="divider">/</span></li>
            <?php
            for($i = 1; $i < $arrayLength; $i++) { ?>
                <?php if($i < $arrayLength - 1){ ?>
                    <li><a href="<?php echo $breadcrumbArray[$i]["link"]; ?>"><?php echo $breadcrumbArray[$i]["name"]; ?></a> <span class="divider">/</span></li>
                <?php } else { ?>
                    <li class="active"><?php echo $tmpArr[$i]; ?></li>
                <?php } ?>
            <?php } ?>
        </ul>

        <?php if($debug) { ?>
        <div class="row-fluid">
            <div class="span12">
                <div class="block">
                    <div class="text-center">
                        <h4>Responsive debug</h4>
                        <ul class="responsive-utilities-test">
                            <li>Phone<span class="visible-phone">&#10004; Phone</span></li>
                            <li>Tablet<span class="visible-tablet">&#10004; Tablet</span></li>
                            <li>Desktop<span class="visible-desktop">&#10004; Desktop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php }; ?>

        <div class="row-fluid">
            <div class="span12">
                <div class="block">
                    <div class="title text-center">
                        <a href="<?php echo $breadcrumbArray[$arrayLength - 2]["link"]; ?>" class="backButton"><div class="icon backWhite"></div></a>
                        <?php echo $currentDirectoryName; ?>
                    </div>
                    <?php include("application/views/filelist.php"); ?>
                </div>
            </div>
        </div>

        <hr>

        <footer>
            <p>&copy; Dédiciné 2013</p>
        </footer>

    </div>

    </div><!--/.fluid-container-->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="application/bootstrap/js/bootstrap.js"></script>

</body>
</html>
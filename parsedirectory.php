<?php require_once('config.php');?>

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

    <?php
        $currentDirectory = $_GET["path"];
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

    <div class="bigList">
        <h2>
            <a href="<?php echo $backLink; ?>" class="backButton"><div class="icon backWhite"></div></a>
            <?php echo $currentDirectoryName; ?>
        </h2>
        <?php
        $files = getDirectoryList($currentDirectory);
        include("views/filelist.php");
        ?>
    </div>

</div>


</body>
</html>
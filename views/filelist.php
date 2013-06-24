<ul class="list">
    <?php
    $files = getDirectoryList($currentDirectory);
    $index = 0;
    foreach($files as $time => $fileArr)
    {
        if(isset($littleList) && $littleList && $index == 5)
            break;
        $fileName = $fileArr["name"];
        if(isset($littleList) && $littleList)
        {
            $fileName = substr($fileArr["name"], 0, 35);
            if(strlen($fileArr["name"]) > 35)
                $fileName .= "...";
        }

        $link = $currentDirectory . "/" . $fileArr["name"];
        if($fileArr["type"] == "folder")
            $link = "/parsedirectory.php?path=" . urlencode($link);

    ?>
        <li class="listElement <?php if($index == 0) echo "first"; ?>">
            <a href="<?php echo $link; ?>">
                <div class="icon <?php echo $fileArr["type"] ?>"></div>
                <div class="name"><span class="v-aligner"></span><span class="verticalCenter innerName"><?php echo $fileName; ?></span></div>
                <div class="date"><span class="v-aligner"></span><span class="verticalCenter innerDate"><?php echo $fileArr["date"]; ?></span></div>
                <div class="clear"></div>
            </a>
        </li>
    <?php
        $index++;
    }
    ?>
</ul>


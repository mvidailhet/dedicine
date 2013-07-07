<?php
include_once("functions.php");

$directory = "../../" . $_GET["path"];
removeEmptyDirectories($directory);
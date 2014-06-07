<?php
$my_file = array("index.php", "get_log.php", "dir.php", "ytdl.php", "youtube-dl");
$base = ".";
if($dir =opendir($base)){
    while (false !== ($file = readdir($dir))) {
            if (!is_dir($base."/".$file) && substr($file,0,1) != '.' && !in_array($file, $my_file)) {
                        echo "<a href='".$base."/".$file."'>".$file."</a><br/>";
                                }
                }
    closedir($dir);
}

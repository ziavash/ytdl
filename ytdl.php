<?php

$time = time(true);

$filename = "/tmp/ytdl_".$time.".log";
if(isset($_POST['URL'])){
    exec("youtube-dl ".$_POST['URL']." > ".$filename." 2> ".$filename ." &");
    echo $filename;

}else{
    echo "False";
}
